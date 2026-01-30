<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class UserList extends Component
{
    public $type = 'Anime';
    public $status = 'All';
    public $search = '';

    public function getStatsProperty()
    {
        $reviews = Review::with('series')->where('user_id', Auth::id())->get();

        return [
            'total_series' => $reviews->count(),
            'episodes_watched' => $reviews->where('series.type', 'Anime')->sum('progress'),
            'chapters_read' => $reviews->where('series.type', 'Manga')->sum('progress'),
        ];
    }

    public function render()
    {
        $reviews = Review::with('series')
            ->where('user_id', Auth::id())
            // 1. Search Filter
            ->when($this->search, function ($query) {
                $query->whereHas('series', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
            })
            // 2. Type Filter
            ->when($this->type !== 'All', function ($query) {
                $query->whereHas('series', function ($q) {
                    $q->where('type', $this->type);
                });
            })
            ->when($this->status !== 'All', function ($query) {
                $query->where('status', $this->status);
            })
            ->latest()
            ->get();

        return view('livewire.user-list', [
            'reviews' => $reviews,
            'stats' => $this->stats
        ]);
    }
}