<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    //
    use AuthorizesRequests;

    public function store(Request $request, $seriesId)
    {
        // input validation
        $request->validate([
            'content' => 'required|min:3|max:1000',
        ]);

        Comments::create([
            'content' => $request->input('content'),
            'series_id' => $seriesId,
            'user_id' => Auth::id(),
        ]);

        return back();
    }

    public function destroy(Comments $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully.');
    }
}
