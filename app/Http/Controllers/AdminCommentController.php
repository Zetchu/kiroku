<?php

namespace App\Http\Controllers;

use App\Models\Comments;

class AdminCommentController extends Controller
{
    public function index()
    {
        $comments = Comments::with(['user', 'series'])->latest()->paginate(20);
        return view('admin.comments.index', compact('comments'));
    }

    // Delete a comment
    public function destroy(Comments $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments.index')->with('success', 'Comment deleted successfully.');
    }
}
