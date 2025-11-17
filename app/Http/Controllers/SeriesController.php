<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    function index()
    {
        // Loads data

        // Returns a view with the data

        return view('series.index');
    }

    function show($series)
    {
        return view('series.show', compact('series'));
    }

    //
}
