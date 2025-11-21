<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Series $series)
    {
        $validated = $request->validate([
            'status' => 'required|in:Watching,Completed,Plan to Watch',
            'rating' => 'nullable|integer|min:1|max:10',
            'progress' => 'nullable|integer|min:0',
        ]);

        Review::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'series_id' => $series->id
            ],
            [
                'status' => $validated['status'],
                'rating' => $request->rating, //nullable
                'progress' => $request->progress ?? 0,
            ]
        );

        return back()->with('success', 'List updated successfully!');
    }
}
