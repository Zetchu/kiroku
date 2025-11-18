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

        $series = Series::with('genres')->get();
        $genres = Genre::all();

        // Returns a view with the data

        return view('series.index', compact('series', 'genres'));
    }

    function show(int $id)
    {
        $series = Series::find($id);
        // get all the comments for a specific series that we loaded
//        $comments = Comments::where('series_id', $series->id)->get();

        return view('series.show', compact('series'));
    }

    //
}
