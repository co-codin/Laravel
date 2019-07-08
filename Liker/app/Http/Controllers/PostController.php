<?php

namespace App\Http\Controllers;

use App\Post;
use App\Events\PostCreated;
use Illuminate\Http\Request;
use App\Transformers\PostTransformer;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::latest()->get();

        return fractal()
               ->collection($posts)
               ->transformWith(new PostTransformer())
               ->toArray();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $post = $request->user()->posts()->create($request->only('body'));

        event(new PostCreated($post));

        return fractal()
               ->item($post)
               ->transformWith(new PostTransformer())
               ->toArray();
    }
}
