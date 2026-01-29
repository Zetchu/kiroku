<?php

namespace App\Livewire;

use App\Interfaces\AnimeLibraryInterface;
use App\Models\Genre;
use App\Models\Series;
use Livewire\Component;

class SeriesImporter extends Component
{
    public $type = 'anime';

    public $page = 1;

    public $statusMessage = '';

    public function import(AnimeLibraryInterface $animeService)
    {
        // fetch data
        $results = $animeService->fetchPopular($this->type, $this->page);

        if (empty($results)) {
            $this->statusMessage = "Error: Could not fetch data for Page {$this->page}.";

            return;
        }

        $count = 0;
        foreach ($results as $data) {
            $series = Series::updateOrCreate(
                ['name' => $data['name']],
                [
                    'synopsis' => $data['synopsis'] ?? 'No synopsis available', // Added fallback
                    'type' => $data['type'],
                    'status' => $data['status'],
                    'studio' => $data['studio'],
                    'episodes' => $data['episodes'],
                    'imageUrl' => $data['imageUrl'],
                ]
            );

            // genre sync
            if (! empty($data['genres'])) {
                $genreIds = [];
                foreach ($data['genres'] as $genreName) {
                    $genre = Genre::firstOrCreate(['name' => $genreName]);
                    $genreIds[] = $genre->id;
                }
                $series->genres()->sync($genreIds);
            }

            // image handling
            if (! $series->hasMedia('covers') && ! empty($data['imageUrl'])) {
                try {
                    $series->addMediaFromUrl($data['imageUrl'])->toMediaCollection('covers');
                } catch (\Exception $e) {
                    // Fail silently or log error
                }
            }
            $count++;
        }

        $this->statusMessage = "Success! Imported {$count} {$this->type} series.";
        $this->dispatch('series-imported');
    }

    public function render()
    {
        return view('livewire.series-importer');
    }
}
