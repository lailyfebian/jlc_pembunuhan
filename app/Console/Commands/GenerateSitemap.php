<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\KeywordTemplate;
use App\Models\Region;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate sitemap files';

    public function handle()
    {
        $fileNumber = 1;
        $currentUrls = [];
        $sitemaps = [];

        $keywords = KeywordTemplate::select('slug')->cursor();

        foreach ($keywords as $keyword) {

            // =========================
            // KEYWORD ONLY
            // =========================
            $currentUrls[] = route('sales.keyword_only', [
                'keywords' => $keyword->slug,
            ]);

            if (count($currentUrls) >= 1000) {
                $filename = $this->writeSitemap(
                    $currentUrls,
                    $fileNumber++
                );

                $sitemaps[] = url($filename);
                $currentUrls = [];
            }

            // =========================
            // KEYWORD + REGION
            // =========================
            Region::select('slug', 'type')
                ->cursor()
                ->each(function ($region) use (
                    $keyword,
                    &$currentUrls,
                    &$fileNumber,
                    &$sitemaps
                ) {

                    $currentUrls[] = route('sales.keyword.region', [
                        'keywords' => $keyword->slug,
                        'type' => $region->type,
                        'locationSlug' => $region->slug,
                    ]);

                    if (count($currentUrls) >= 1000) {

                        $filename = $this->writeSitemap(
                            $currentUrls,
                            $fileNumber++
                        );

                        $sitemaps[] = url($filename);

                        $currentUrls = [];
                    }
                });
        }

        // Simpan sisa URL
        if (!empty($currentUrls)) {

            $filename = $this->writeSitemap(
                $currentUrls,
                $fileNumber++
            );

            $sitemaps[] = url($filename);
        }

        // Generate sitemap index
        file_put_contents(
            base_path('../public_html/sitemap.xml'),
            $this->generateIndex($sitemaps)
        );

        $this->info('Sitemap index generated.');
        $this->info('Total sitemap files: ' . count($sitemaps));
    }

    private function writeSitemap(array $urls, int $number): string
    {
        $filename = "sitemap-{$number}.xml";

        file_put_contents(
            base_path("../public_html/{$filename}"),
            $this->generateXml($urls)
        );

        $this->info("Generated {$filename} (" . count($urls) . " URLs)");

        return $filename;
    }

    private function generateXml(array $urls): string
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($urls as $url) {

            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($url, ENT_XML1) . '</loc>';
            $xml .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return $xml;
    }

    private function generateIndex(array $sitemaps): string
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($sitemaps as $sitemap) {

            $xml .= '<sitemap>';
            $xml .= '<loc>' . htmlspecialchars($sitemap, ENT_XML1) . '</loc>';
            $xml .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
            $xml .= '</sitemap>';
        }

        $xml .= '</sitemapindex>';

        return $xml;
    }
}