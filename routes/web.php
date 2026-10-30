<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesPageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Cache;
use App\Models\Region;
use App\Models\KeywordTemplate;

Route::get('/', function () {

    $cities = Cache::remember('homepage_cities', 86400, function () {
        return Region::where('type', 'kota')
            ->orderBy('id')
            ->get();
    });
    $keywordTemplate = Cache::remember('homepage_keyword_templates', 86400, function () {
        return KeywordTemplate::orderBy('name')->first();
    });

    return view('layouts.main-page.home', compact('cities', 'keywordTemplate'));
});

Route::get('/tentang-kami', function () {
    return view('layouts.main-page.about-us');
});

Route::get('/testimonial', function () {
    return view('layouts.main-page.testimonial');
});

Route::get('/hubungi-kami', function () {
    return view('layouts.main-page.contact-us');
});

Route::get('/promo', function () {
    return view('layouts.main-page.promo');
});

// 1. Keyword + region
Route::get('/{keywords}/{type}/{locationSlug}/terbaik', [SalesPageController::class, 'keywordWithRegion'])
    ->where([
        'keywords' => '[a-zA-Z0-9\-]+',
        'type' => '(kota|kecamatan|kelurahan|desa)',
        'locationSlug' => '[a-z0-9\-]+'
    ])
    ->name('sales.keyword.region');

Route::get('/umroh-haji/{keywords}', [SalesPageController::class, 'keywordOnly'])
    ->where([
        'keywords' => '[a-zA-Z0-9\-]+',
    ])
    ->name('sales.keyword_only');

// 2. Keyword only
Route::get('/travel/artikel/{article}', [ArticleController::class, 'show']);

// 2. Keyword only
Route::get('/travel/{keywords}', [SalesPageController::class, 'keywordOnly'])
    ->where([
        'keywords' => '[a-zA-Z0-9\-]+',
    ])
    ->name('sales.keyword.only');


