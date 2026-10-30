<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\PageContent;
use App\Models\Region;
use App\Models\KeywordTemplate;

class SalesPageController extends Controller
{
    /**
     * ----------------------------------------------
     * KEYWORD + REGION
     * ----------------------------------------------
     */
    public function keywordWithRegion($keywords, $type, $locationSlug)
    {
        $region = Region::where('slug', $locationSlug)->firstOrFail();
        $keyword = KeywordTemplate::where('slug', $keywords)->firstOrFail();

        $year = date('Y');

        $regionTrail = $this->buildRegionTrail($region);

        $title = str_replace(
            ['{region}', '{year}'],
            [$regionTrail, $year],
            $keyword->title_region_template ?: $keyword->title_template
        );

        $metaDescription = str_replace(
            ['{region}', '{year}'],
            [$regionTrail, $year],
            $keyword->meta_region_description_template ?: $keyword->meta_description_template
        );

        $page = (object) [
            'title' => $title,
            'meta_description' => $metaDescription,
            'slug' => $keyword->slug,
            'data' => [],
        ];
        
        $cities = Cache::remember('all_cities', 86400, function () {
            return Region::where('type', 'kota')
                ->orderBy('id')
                ->get();
        });

        return view('layouts.sales-page.show', [
            'region'      => $region,
            'regionType'  => $region->type,
            'keyword'     => $keyword,
            'page'        => $page,
            'data'        => [],
            'regionTrail' => $regionTrail,
            'cities'      => $cities,
        ]);
    }

    /**
     * Build region trail string
     */
    private function buildRegionTrail(Region $region): string
    {
        $trail = $region->name;
        if (in_array($region->type, ['desa', 'kelurahan'])) {
            $trail .= ' ' . ($region->parent->name ?? '') . ' ' . ($region->parent?->parent->name ?? '');
        } elseif ($region->type === 'kecamatan') {
            $trail .= ' ' . ($region->parent->name ?? '');
        }
        return $trail;
    }

    /**
     * Cari PageContent sesuai fallback logic
     */
    private function findPageContent(int $keywordId, ?int $regionId, string $regionType, ?int $parentDistrictId, ?int $parentCityId)
    {
        $query = PageContent::where('keyword_template_id', $keywordId);

        // 1. Jika region_id ada → ambil paling spesifik
        if ($regionId) {
            $page = (clone $query)->where('region_id', $regionId)->first();
            if ($page) return $page;
        }

        // 2. Fallback berdasarkan region_type
        switch ($regionType) {
            case 'kota':
                if ($parentCityId) {
                    $page = (clone $query)
                        ->whereNull('region_id')
                        ->where('region_type', 'kota')
                        ->where('parent_city_id', $parentCityId)
                        ->first();
                    if ($page) return $page;
                }
                $page = (clone $query)
                    ->whereNull('region_id')
                    ->where('region_type', 'kota')
                    ->first();
                if ($page) return $page;
                break;

            case 'kecamatan':
            case 'kelurahan':
            case 'desa':
                $types = in_array($regionType, ['kelurahan', 'desa']) ? ['kelurahan', 'desa'] : ['kecamatan'];

                // Parent district spesifik
                if ($parentDistrictId) {
                    $page = (clone $query)
                        ->whereNull('region_id')
                        ->whereIn('region_type', $types)
                        ->where('parent_district_id', $parentDistrictId)
                        ->first();
                    if ($page) return $page;
                }

                // Parent city fallback
                if ($parentCityId) {
                    $page = (clone $query)
                        ->whereNull('region_id')
                        ->whereIn('region_type', $types)
                        ->whereNull('parent_district_id')
                        ->where('parent_city_id', $parentCityId)
                        ->first();
                    if ($page) return $page;
                }

                // Global fallback type
                $page = (clone $query)
                    ->whereNull('region_id')
                    ->whereIn('region_type', $types)
                    ->first();
                if ($page) return $page;

                break;
        }

        // 3. Global fallback terakhir
        return (clone $query)->whereNull('region_id')->firstOrFail();
    }


    /**
     * Replace token {region} & {year} di data section
     */
    private function replaceTokensInData(array $rawData, string $regionTrail, string $year): array
    {
        $data = [];
        foreach ($rawData as $section) {
            if (!empty($section['type'])) {
                array_walk_recursive($section, function (&$value) use ($regionTrail, $year) {
                    if (is_string($value)) {
                        $value = str_replace(['{region}', '{year}'], [$regionTrail, $year], $value);
                    }
                });
                $data[$section['type']] = $section;
            }
        }
        return $data;
    }


    /**
     * ----------------------------------------------
     * KEYWORD ONLY
     * ----------------------------------------------
     */
    public function keywordOnly($keywords)
    {
        $keyword = KeywordTemplate::where('slug', $keywords)->firstOrFail();

        $year = date('Y');

        $title = str_replace(
            '{year}',
            $year,
            $keyword->title_template ?: $keyword->name
        );

        $metaDescription = str_replace(
            '{year}',
            $year,
            $keyword->meta_description_template ?: ''
        );

        $page = (object) [
            'title' => $title,
            'meta_description' => $metaDescription,
            'slug' => $keyword->slug,
            'data' => [],
        ];
        
        $cities = Cache::remember('all_cities', 86400, function () {
            return Region::where('type', 'kota')
                ->orderBy('id')
                ->get();
        });

        return view('layouts.sales-page.show', [
            'region'      => null,
            'regionType'  => null,
            'keyword'     => $keyword,
            'page'        => $page,
            'data'        => [],
            'regionTrail' => null,
            'cities'      => $cities,
        ]);
    }

}
