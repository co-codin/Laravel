<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Transformers\PostTransformer;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();

        return fractal()
               ->collection($posts)
               ->transformWith(new PostTransformer())
               ->toArray();
    }
}
