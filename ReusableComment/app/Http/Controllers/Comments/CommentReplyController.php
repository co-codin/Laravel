<?php

namespace App\Http\Controllers\Comments;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;

class CommentReplyController extends Controller
{
    public function store(Comment $comment, Request $request)
    {
        $this->authorize('reply', $comment);
        
        $this->validate($request, [
            'body' => 'required|max:5000'
        ]);

        $reply = $comment->children()->make([
            'body' => $request->body
        ]);

        $reply->commentable()->associate($comment->commentable);

        $request->user()->comments()->save($reply);

        return new CommentResource($reply);
    }
}
