<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Series;
use Illuminate\Http\Request;

class AdminSeriesController extends Controller
{
    public function index(Request $request)
    {
        $query = Series::with('genres')->latest();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $series = $query->paginate(10)->withQueryString();
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
            'photo' => 'required|image|max:4096',
            'studio' => 'nullable|string|max:255',
            'episodes' => 'nullable|integer|min:0',
            'genres' => 'array',
            'genres.*' => 'exists:genres,id',
        ]);

        $series = Series::create($request->except('genres', 'photo') + ['imageUrl' => '']);

        if ($request->hasFile('photo')) {
            $series->addMediaFromRequest('photo')->toMediaCollection('covers');
        }

        if ($request->has('genres')) {
            $series->genres()->attach($request->genres);
        }
        cache()->forget('trending_series');
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
            'photo' => 'nullable|image|max:4096',
            'studio' => 'nullable|string|max:255',
            'episodes' => 'nullable|integer|min:0',
            'genres' => 'array',
            'genres.*' => 'exists:genres,id',
        ]);

        $series->update($request->except('genres'));

        if ($request->hasFile('photo')) {
            $series->clearMediaCollection('covers');
            $series->addMediaFromRequest('photo')->toMediaCollection('covers');
        }

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