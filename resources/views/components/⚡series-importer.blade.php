<?php

use Livewire\Component;
use App\Interfaces\AnimeLibraryInterface;
use App\Models\Genre;
use App\Models\Series;

new class extends Component {
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
                    'synopsis' => $data['synopsis'],
                    'type' => $data['type'],
                    'status' => $data['status'],
                    'studio' => $data['studio'],
                    'episodes' => $data['episodes'],
                    'imageUrl' => $data['imageUrl'],
                ]
            );

            // genre sync, we either find existing or add new
            $genreIds = [];
            foreach ($data['genres'] as $genreName) {
                $genre = Genre::firstOrCreate(['name' => $genreName]);
                $genreIds[] = $genre->id;
            }
            $series->genres()->sync($genreIds);

            // image handling
            if (!$series->hasMedia('covers')) {
                try {
                    $series->addMediaFromUrl($data['imageUrl'])->toMediaCollection('covers');
                } catch (\Exception $e) {
                    // handle errors later
                }
            }
            $count++;
        }

        $this->statusMessage = "Success! Imported {$count} {$this->type} series.";
        $this->dispatch('series-imported');
    }
};
?>

<div class="flex items-center gap-4">
    <select wire:model="type"
            class="bg-black/30 border border-white/10 text-white text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block p-2.5">
        <option value="anime">Top Anime</option>
        <option value="manga">Top Manga</option>
    </select>

    <div class="flex items-center gap-2">
        <span class="text-gray-400 text-sm">Page:</span>
        <input type="number" wire:model="page" min="1" max="100"
               class="w-16 bg-black/30 border border-white/10 text-white text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block p-2.5 text-center">
    </div>

    <button wire:click="import"
            wire:loading.attr="disabled"
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-4 rounded-2xl border border-blue-500/30 transition-all flex items-center gap-2">

        <span wire:loading.remove>
            Fetch API
        </span>

        <div wire:loading class="flex items-center gap-2">
            <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Fetching...
        </div>
    </button>

    @if($statusMessage)
        <span class="text-sm font-medium {{ str_contains($statusMessage, 'Error') ? 'text-red-400' : 'text-green-400' }} animate-pulse">
            {{ $statusMessage }}
        </span>
    @endif
</div>