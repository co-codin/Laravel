<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with(['user', 'children.user'])
                            ->latest()
                            ->paginate(2);

        // $comments->merge($comments->pluck('children')->flatten())  Only one level

        $children = Comment::with(['user'])
                    ->whereIn('base_id', $comments->pluck('id')->toArray())
                    ->get();

        return CommentResource::collection(
            $comments->merge($children)
        );
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
    }
}
