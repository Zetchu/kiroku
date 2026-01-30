<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Genre;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SeriesController extends Controller
{
    public function index()
    {
        return view('series.index'); // Livewire now handles the data fetching
    }

    function show(int $id)
    {
        $series = Series::with(['genres', 'comments.user'])->findOrFail($id);

        $userReview = auth()->check()
            ? \App\Models\Review::where('user_id', auth()->id())->where('series_id', $id)->first()
            : null;

        return view('series.show', compact('series', 'userReview'));
    }

    //
}
