<?php

namespace App\Interfaces;

interface AnimeLibraryInterface
{
    /**
     * Fetch top series (Anime or Manga)
     * Returns an array of standardized data.
     */
    public function fetchPopular(string $type = 'anime', int $page = 1): array;
}