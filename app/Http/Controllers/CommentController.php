<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->post_id = $postId;
        $comment->user_id = Auth::id();
        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
