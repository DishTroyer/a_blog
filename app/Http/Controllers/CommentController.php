<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        $comment = new Comment;
        $request->validate([
            'comment_body' => 'required',
        ]);
        $comment->body = $request->get('comment_body');
        
        $comment->user()->associate($request->user());
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);

        return back();
    }
    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $request->validate([
            'comment_body' => 'required',
        ]);
        $reply->body = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back();

    }
}
