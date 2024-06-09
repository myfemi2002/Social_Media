<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(Request $request, $commentId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $reply = new Reply();
        $reply->comment_id = $commentId;
        $reply->user_id = Auth::id();
        $reply->content = $request->input('content');
        $reply->save();

        return redirect()->back()->with('success', 'Reply added successfully!');
    }
}
