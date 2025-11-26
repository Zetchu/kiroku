<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Genre;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    function index()
    {
        // Loads data

        $series = Series::with('genres')
            ->withAvg('reviews', 'rating')
            ->paginate(18);
        $genres = Genre::all();

        // Returns a view with the data

        return view('series.index', compact('series', 'genres'));
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
