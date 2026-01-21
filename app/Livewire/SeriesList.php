<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Series;

class SeriesList extends Component
{
    use WithPagination;

    public $search = '';

    #[On('series-imported')]
    public function refreshList()
    {
        // for re rendering
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $series = Series::find($id);

        if ($series) {
            $series->genres()->detach();
            $series->delete();
            session()->flash('success', 'Series deleted successfully.');
        }
    }

    public function render()
    {
        $query = Series::with(['genres', 'media'])->latest();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        
        return view('livewire.series-list', [
            'series' => $query->paginate(10)
        ]);
    }
}