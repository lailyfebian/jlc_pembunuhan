<?php

namespace App\Imports;

use App\Models\KeywordTemplate;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Filament\Notifications\Notification;

class KeywordTemplateImport implements ToCollection, WithHeadingRow
{
    /**
     * Import data Keyword Template dari file Excel.
     *
     * Kolom wajib: name
     * Kolom opsional: slug (akan otomatis dibuat jika kosong)
     * Slug duplikat akan otomatis ditambahkan angka unik di belakang.
     */
    public function collection(Collection $rows)
    {
        $inserted = 0;
        $updated = 0;

        foreach ($rows as $row) {

            $name = trim($row['kata_kunci'] ?? '');

            if (blank($name)) {
                continue;
            }

            $slug = trim($row['slug'] ?? '');

            if (blank($slug)) {
                $slug = Str::slug($name);
            }

            $existing = KeywordTemplate::where('name', $name)->first();

            if (!$existing) {
                $slug = $this->ensureUniqueSlug($slug);
            }

            $template = KeywordTemplate::updateOrCreate(
                [
                    'name' => $name,
                ],
                [
                    'slug' => $existing?->slug ?? $slug,

                    'title_template' => trim($row['title'] ?? ''),

                    'meta_description_template' => trim(
                        $row['meta_description'] ?? ''
                    ),

                    'title_region_template' => trim(
                        $row['title_region'] ?? ''
                    ),

                    'meta_region_description_template' => trim(
                        $row['meta_description_region'] ?? ''
                    ),
                ]
            );

            if ($template->wasRecentlyCreated) {
                $inserted++;
            } else {
                $updated++;
            }
        }

        Notification::make()
            ->title('Import Selesai')
            ->body("✅ {$inserted} data baru ditambahkan\n✏️ {$updated} data diperbarui")
            ->success()
            ->send();
    }

    /**
     * Pastikan slug unik (tambahkan angka jika sudah ada).
     */
    protected function ensureUniqueSlug(string $slug): string
    {
        $original = $slug;
        $counter = 1;

        while (KeywordTemplate::where('slug', $slug)->exists()) {
            $slug = "{$original}-{$counter}";
            $counter++;
        }

        return $slug;
    }
}