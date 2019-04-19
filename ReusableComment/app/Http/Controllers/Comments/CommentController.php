<?php

namespace App\Http\Controllers\Comments;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function update(Comment $comment, Request $request)
    {
        $this->authorize('update', $comment);

        $this->validate($request, [
            'body' => 'required|max:5000'
        ]);

        $comment->update([
            'body' => $request->body
        ]);

        return new CommentResource($comment);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
    }
}
