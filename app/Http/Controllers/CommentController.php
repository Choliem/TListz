<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Store a new comment.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id', // Validate user_id
            'body' => 'required|string|max:500',
        ]);

        Comment::create([
            'post_id' => $validated['post_id'],
            'user_id' => $validated['user_id'], // Use user_id from the form
            'body' => $validated['body'],
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

}
