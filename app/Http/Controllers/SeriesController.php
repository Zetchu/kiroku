<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    function index()
    {
        // Loads data

        $series = Series::all();

        // Returns a view with the data

        return view('series.index', compact('series'));
    }

    function show($series)
    {
        return view('series.show', compact('series'));
    }

    //
}
