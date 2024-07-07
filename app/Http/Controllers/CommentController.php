<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    // store
    public function store(Request $request, Post $post)
    {
        $request->validate(
            [
            'body' => 'required',
            ]
        );

        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->body = $request->body;
        $comment->save();

        return redirect()
            ->route('posts.show', $post);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()
            ->route('posts.show', $comment->post);
    }
}
