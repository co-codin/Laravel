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
            'children',
            'children.children',
            'children.children.children' // Concerntrate on frontend
        ])->isParent()->latest()->get();

        return CommentResource::collection(
            $comments
        );
    }
}
