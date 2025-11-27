<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index(Request $request)
    {
        $query = Comments::with(['user', 'series'])->latest();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('content', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('series', function ($seriesQuery) use ($search) {
                        $seriesQuery->where('name', 'like', "%{$search}%");
                    });
            });
        }

        $comments = $query->paginate(20)->withQueryString();
        return view('admin.comments.index', compact('comments'));
    }

    // Delete a comment
    public function destroy(Comments $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments.index')->with('success', 'Comment deleted successfully.');
    }
}
