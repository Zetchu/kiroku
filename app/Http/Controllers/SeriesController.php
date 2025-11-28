<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Genre;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class SeriesController extends Controller
{
    function index(Request $request)
    {
        // Loads data

        $query = Series::with(['genres', 'media'])
            ->withAvg('reviews', 'rating');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('genre') && $request->genre !== 'all') {
            // Check if the series has the selected genre
            $query->whereHas('genres', function (Builder $q) use ($request) {
                $q->where('genres.id', $request->genre);
            });
        }

        $type = $request->input('type', 'Anime');
        if ($type !== 'All') {
            $query->where('type', $type);
        }

        $series = $query->paginate(18)->withQueryString();

        $genres = Genre::orderBy('name')->get();

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
