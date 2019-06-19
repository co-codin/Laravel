<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Transformers\PostTransformer;

class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post, Request $request)
    {
        $this->authorize('like', $post);

        if ($post->maxLikesReachedFor($request->user())) {
            return response(null ,429);
        }

        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return fractal()
               ->item($post->fresh())
               ->transformWith(new PostTransformer())
               ->toArray();
    }
}
