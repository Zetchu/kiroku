<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Series;
use Illuminate\Http\Request;

class AdminSeriesController extends Controller
{
    public function index()
    {
        $series = Series::with('genres')->latest()->paginate(10);
        return view('admin.series.index', compact('series'));
    }

    public function create()
    {
        $genres = Genre::orderBy('name')->get();
        return view('admin.series.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'synopsis' => 'nullable|string',
            'type' => 'required|in:Anime,Manga',
            'status' => 'required|in:Airing,Finished,Not yet aired,Cancelled',
            'imageUrl' => 'required|url',
            'studio' => 'nullable|string|max:255',
            'episodes' => 'nullable|integer|min:0',
            'genres' => 'array',
            'genres.*' => 'exists:genres,id',
        ]);

        $series = Series::create($request->except('genres'));

        if ($request->has('genres')) {
            $series->genres()->attach($request->genres);
        }

        return redirect()->route('admin.series.index')->with('success', 'Series created successfully.');
    }

    public function edit(Series $series)
    {
        $genres = Genre::orderBy('name')->get();
        $series->load('genres');

        return view('admin.series.edit', compact('series', 'genres'));
    }

    public function update(Request $request, Series $series)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'synopsis' => 'nullable|string',
            'type' => 'required|in:Anime,Manga',
            'status' => 'required|in:Airing,Finished,Not yet aired,Cancelled',
            'imageUrl' => 'required|url',
            'studio' => 'nullable|string|max:255',
            'episodes' => 'nullable|integer|min:0',
            'genres' => 'array',
            'genres.*' => 'exists:genres,id',
        ]);

        $series->update($request->except('genres'));

        $series->genres()->sync($request->genres ?? []);

        return redirect()->route('admin.series.index')->with('success', 'Series updated successfully.');
    }

    public function destroy(Series $series)
    {
        $series->genres()->detach();
        $series->delete();
        return redirect()->route('admin.series.index')->with('success', 'Series deleted successfully.');
    }
}