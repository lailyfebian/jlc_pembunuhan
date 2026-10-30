<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageContentResource\Pages;
use App\Models\PageContent;
use App\Models\Region;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Tables\Actions\Action;
use Filament\Forms\Set;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PageContentImport;

class PageContentResource extends Resource
{
    protected static ?string $model = PageContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Konten Halaman';

    public static function getNavigationSort(): ?int
    {
        return 3; 
    }

    public static function form(Form $form): Form
    {
        return $form->schema([

            // Template Keyword
            Forms\Components\Select::make('keyword_template_id')
                ->relationship('keywordTemplate', 'name')
                ->label('Template Keyword')
                ->searchable()
                ->required(),

            // PILIH TIPE WILAYAH
            Forms\Components\Select::make('region_type')
                ->label('Tipe Wilayah')
                ->options([
                    'kota' => 'Kota / Kabupaten',
                    'kecamatan' => 'Kecamatan',
                    'kelurahan' => 'Kelurahan',
                    'desa' => 'Desa',
                ])
                ->reactive(),

            // Jika tipe kecamatan / kelurahan / desa -> pilih kota
            Forms\Components\Select::make('parent_city_id')
                ->label('Kota / Kabupaten')
                ->options(fn () => Region::where('type', 'kota')->orderBy('name')->pluck('name', 'id'))
                ->reactive()
                ->visible(fn ($get) => in_array($get('region_type'), ['kecamatan', 'kelurahan', 'desa']))
                ->searchable()
                ->placeholder('Pilih Kota/Kabupaten...'),

            // Jika tipe kelurahan / desa -> pilih kecamatan dari kota
            Forms\Components\Select::make('parent_district_id')
                ->label('Kecamatan')
                ->options(function (callable $get) {
                    $cityId = $get('parent_city_id');
                    if (!$cityId) return [];
                    return Region::where('type', 'kecamatan')
                        ->where('parent_id', $cityId)
                        ->orderBy('name')
                        ->pluck('name', 'id');
                })
                ->reactive()
                ->visible(fn ($get) => in_array($get('region_type'), ['kelurahan', 'desa']))
                ->searchable()
                ->placeholder('Pilih Kecamatan...'),

            // Pilihan wilayah akhir berdasarkan tipe
            Forms\Components\Select::make('region_id')
                ->label('Wilayah')
                ->options(function (callable $get) {
                    $type = $get('region_type');
                    if (!$type) return [];

                    // Jika kecamatan -> ambil semua kecamatan dari kota
                    if ($type === 'kecamatan' && $get('parent_city_id')) {
                        return Region::where('type', 'kecamatan')
                            ->where('parent_id', $get('parent_city_id'))
                            ->orderBy('name')
                            ->pluck('name', 'id');
                    }

                    // Jika kelurahan/desa -> ambil dari kecamatan terpilih
                    if (in_array($type, ['kelurahan', 'desa']) && $get('parent_district_id')) {
                        return Region::where('type', $type)
                            ->where('parent_id', $get('parent_district_id'))
                            ->orderBy('name')
                            ->pluck('name', 'id');
                    }

                    // Jika kota -> langsung ambil daftar kota
                    if ($type === 'kota') {
                        return Region::where('type', 'kota')
                            ->orderBy('name')
                            ->pluck('name', 'id');
                    }

                    return [];
                })
                ->reactive()
                ->searchable()
                ->nullable()
                ->helperText('Kosongkan jika konten berlaku global untuk semua wilayah.'),

            // Judul halaman
            Forms\Components\TextInput::make('title')
                ->label('Judul Halaman')
                ->required()
                ->reactive()
                ->afterStateUpdated(function (callable $set, $state, callable $get) {
                    $currentSlug = $get('slug');
                    if (empty($currentSlug) || $currentSlug === Str::slug($get('title') ?? '')) {
                        $set('slug', static::generateUniqueSlug($state));
                    }
                }),

            // Slug (auto-generate jika kosong)
            Forms\Components\TextInput::make('slug')
                ->label('Slug')
                ->helperText('Slug akan otomatis dibuat dari judul jika dikosongkan.')
                ->reactive()
                ->afterStateHydrated(function ($set, $record) {
                    if ($record && empty($record->slug)) {
                        $set('slug', static::generateUniqueSlug($record->title));
                    }
                })
                ->dehydrated(true),

            // REPEATER UNTUK SECTION HALAMAN
            Forms\Components\Repeater::make('data')
            ->label('Section Halaman')
            ->schema([

                Forms\Components\Select::make('type')
                    ->label('Tipe Section')
                    ->options([
                        'hero' => 'Hero Section',
                        'about-us' => 'Tentang Kami',
                        'product' => 'Program',
                        'cta' => 'CTA Section',
                        'testimonial' => 'Testimoni',
                        'faq' => 'FAQ Section',
                    ])
                    ->required()
                    ->reactive(),

                // === TITLE SECTION ===
                Forms\Components\TextInput::make('title')
                    ->label('Judul Section')
                    ->visible(fn ($get) => in_array($get('type'), [
                        'hero', 'about-us', 'product', 'cta', 'testimonial', 'faq'
                    ])),

                // === CONTENT hanya untuk section tertentu (advantages tidak pakai konten panjang) ===
                Forms\Components\RichEditor::make('content')
                    ->label('Isi Konten')
                    ->toolbarButtons(['bold', 'italic', 'link', 'bulletList', 'orderedList'])
                    ->visible(fn ($get) => in_array($get('type'), [
                        'hero', 'about-us', 'cta'
                    ])),

                Forms\Components\Repeater::make('items')
                    ->label('Cards Produk')
                    ->visible(fn ($get) => $get('type') === 'product')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Card')
                            ->required(),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->required(),
                    ])
                    ->columns(1),

                Forms\Components\Repeater::make('items')
                    ->label('Cards Tutor')
                    ->visible(fn ($get) => $get('type') === 'testimonial')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Card')
                            ->required(),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->required(),
                    ])
                    ->columns(1),

                Forms\Components\Repeater::make('items')
                    ->label('Cards Testimoni')
                    ->visible(fn ($get) => $get('type') === 'faq')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Nama Card')
                            ->required(),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->required(),
                    ])
                    ->columns(1),
            ])
            ->collapsible()
            ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('keywordTemplate.name')
                ->label('Keyword'),

            Tables\Columns\TextColumn::make('region_type')
                ->label('Tipe Wilayah')
                ->formatStateUsing(fn ($state) => ucfirst($state ?? '-')),

            Tables\Columns\TextColumn::make('region_display')
                ->label('Wilayah')
                ->getStateUsing(function ($record) {
                    // Jika kota = global
                    if ($record->region_type === 'kota' || !$record->region_id) {
                        return 'Global';
                    }

                    // Jika region ada, tampilkan sesuai tipe
                    if ($record->region) {
                        $typeLabel = ucfirst($record->region_type);
                        return "{$typeLabel} {$record->region->name}";
                    }

                    return 'Global';
                }),

            Tables\Columns\TextColumn::make('title')
                ->label('Judul'),

            Tables\Columns\TextColumn::make('slug')
                ->label('Slug'),
        ])
        ->headerActions([
            ExportAction::make(), // ✅ Export semua data

            Action::make('import')
                ->label('Import Excel')
                ->icon('heroicon-o-arrow-up-tray')
                ->color('success')
                ->form([
                    Forms\Components\FileUpload::make('file')
                        ->label('Pilih File Excel (.xlsx)')
                        ->required()
                        ->storeFiles(false)
                        ->acceptedFileTypes([
                            'application/vnd.ms-excel',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        ]),
                ])
                ->action(function (array $data) {
                    Excel::import(new PageContentImport, $data['file']);
                })
                ->successNotificationTitle('Import berhasil!'),
            ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
            Action::make('clone')
                ->label('Clone')
                ->icon('heroicon-o-document-duplicate')
                ->action(function ($record) {
                    $new = $record->replicate(); // clone data
                    $new->slug = Str::slug($record->title . '-' . now()->timestamp);
                    $new->save();

                    \Filament\Notifications\Notification::make()
                        ->title('Berhasil meng-clone data!')
                        ->success()
                        ->send();
                }),

        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPageContents::route('/'),
            'create' => Pages\CreatePageContent::route('/create'),
            'edit' => Pages\EditPageContent::route('/{record}/edit'),
        ];
    }

    /**
     * Generate unique slug from title.
     */
    public static function generateUniqueSlug(string $title): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $count = 2;

        while (PageContent::where('slug', $slug)->exists()) {
            $slug = "{$original}-{$count}";
            $count++;
        }

        if ($slug) {
            return $slug;
        } else {
            return Str::random(8);
        }
    }
}
