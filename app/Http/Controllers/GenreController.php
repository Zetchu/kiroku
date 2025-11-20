<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //
    public function index()
    {
        $genres = Genre::all();

        return view("genre.index", compact("genres"));
    }

    public function show(int $id)
    {
        $genre = Genre::with('series')->findOrFail($id);
        return view('genre.show', compact('genre'));
    }

}
