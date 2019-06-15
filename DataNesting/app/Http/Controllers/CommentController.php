<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with([
            'user',
            'children'
        ])->isParent()->latest()->get();

        return CommentResource::collection(
            $comments
        );
    }
}
