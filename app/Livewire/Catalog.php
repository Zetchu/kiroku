<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Series;
use App\Models\Genre;

class Catalog extends Component
{
    use WithPagination;

    public $search = '';
    public $genre = 'all';
    public $type = 'All';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedGenre()
    {
        $this->resetPage();
    }

    public function updatedType()
    {
        $this->resetPage();
    }

    public function render()
    {
        $series = Series::query()
            ->with('genres')
            ->when($this->search, fn($q) => $q->where('name', 'like', '%' . $this->search . '%'))
            ->when($this->genre !== 'all', fn($q) => $q->whereHas('genres', fn($g) => $g->where('genres.id', $this->genre)))
            ->when($this->type !== 'All', fn($q) => $q->where('type', $this->type))
            ->latest()
            ->paginate(18);

        return view('livewire.catalog', [
            'series' => $series,
            'genres' => Genre::orderBy('name')->get()
        ]);
    }
}