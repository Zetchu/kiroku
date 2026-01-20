<?php

namespace App\Services;

use App\Interfaces\AnimeLibraryInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class JikanService implements AnimeLibraryInterface
{
    public function fetchPopular(string $type = 'anime', int $page = 1): array
    {
        // caching for 1h to avoid limits dfrom api
        return Cache::remember("jikan_top_{$type}_page_{$page}", 3600, function () use ($type, $page) {
            try {
                $response = Http::timeout(15)->get("https://api.jikan.moe/v4/top/{$type}?page={$page}");

                if ($response->failed()) {
                    Log::error("Jikan API Failed: " . $response->body());
                    return [];
                }

                $data = $response->json('data');

                return array_map(function ($item) use ($type) {
                    return [
                        'name' => $item['title'],
                        'synopsis' => $item['synopsis'] ?? 'No synopsis available.',
                        'type' => ucfirst($type),
                        'status' => $this->mapStatus($item['status'] ?? ''),
                        'episodes' => $item['episodes'] ?? 0,
                        'studio' => $this->getStudioOrAuthor($item),
                        'imageUrl' => $item['images']['jpg']['large_image_url'],
                        'genres' => collect($item['genres'] ?? [])->pluck('name')->toArray(),
                    ];
                }, $data);

            } catch (\Exception $e) {
                Log::error("Jikan Service Error: " . $e->getMessage());
                return [];
            }
        });
    }

    private function mapStatus(string $jikanStatus): string
    {
        return match ($jikanStatus) {
            'Finished Airing', 'Finished' => 'Finished',
            'Currently Airing', 'Publishing' => 'Airing',
            'Not yet aired' => 'Not yet aired',
            default => 'Finished', // Fallback
        };
    }

    private function getStudioOrAuthor($item)
    {
        if (!empty($item['studios'])) {
            return $item['studios'][0]['name'];
        }
        if (!empty($item['authors'])) {
            return $item['authors'][0]['name'];
        }
        return 'Unknown';
    }
}