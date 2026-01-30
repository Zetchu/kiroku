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
    public $fetchedData = [];
    public $showModal = false;
    public $step = 1;

    public function openModal()
    {
        $this->reset(['fetchedData', 'statusMessage', 'page', 'type']);
        $this->step = 1;
        $this->showModal = true;
    }

    public function fetch(AnimeLibraryInterface $animeService)
    {
        $this->reset('statusMessage', 'fetchedData');

        $results = $animeService->fetchPopular($this->type, $this->page);

        if (empty($results)) {
            $this->statusMessage = "Error: No data found for Page {$this->page}.";
            return;
        }

        $this->fetchedData = $results;
        $this->step = 2;
    }

    public function backToInput()
    {
        $this->step = 1;
        $this->fetchedData = [];
    }

    public function importToDatabase()
    {
        if (empty($this->fetchedData)) return;

        $count = 0;
        foreach ($this->fetchedData as $data) {
            $series = Series::updateOrCreate(
                ['name' => $data['name']],
                [
                    'synopsis' => $data['synopsis'] ?? 'No synopsis available',
                    'type' => $data['type'],
                    'status' => $data['status'],
                    'studio' => $data['studio'],
                    'episodes' => $data['episodes'],
                    'imageUrl' => $data['imageUrl'],
                ]
            );

            if (!empty($data['genres'])) {
                $genreIds = [];
                foreach ($data['genres'] as $genreName) {
                    $genre = Genre::firstOrCreate(['name' => $genreName]);
                    $genreIds[] = $genre->id;
                }
                $series->genres()->sync($genreIds);
            }

            if (!$series->hasMedia('covers') && !empty($data['imageUrl'])) {
                try {
                    $series->addMediaFromUrl($data['imageUrl'])->toMediaCollection('covers');
                } catch (\Exception $e) {
                }
            }
            $count++;
        }

        $this->showModal = false;
        $this->fetchedData = [];
        $this->statusMessage = "Successfully imported {$count} items!";
        $this->dispatch('series-imported');
    }

    public function render()
    {
        return view('livewire.series-importer');
    }
}