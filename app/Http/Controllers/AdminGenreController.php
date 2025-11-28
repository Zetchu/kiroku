<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class AdminGenreController extends Controller
{
    public function index(Request $request)
    {
        $query = Genre::withCount('series')
            ->orderBy('name');
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $genres = $query->paginate(10)->withQueryString();
        return view('admin.genres.index', compact('genres'));
    }


    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genres,name|max:255',
        ]);

        Genre::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.genres.index')->with('success', 'Genre created successfully.');

    }

    public function edit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required|max:255|unique:genres,name,' . $genre->id,
        ]);

        $genre->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.genres.index')->with('success', 'Genre updated successfully.');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('admin.genres.index')->with('success', 'Genre deleted successfully.');
    }
}
