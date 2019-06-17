<?php

namespace App\Transformers;

use App\Post;
use App\Transformers\UserTransformer;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'author', 'likers'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Post $post)
    {
        return [
            'id' => $post->id,
            'body' => $post->body,
            'likes' => $post->likes->count()
        ];
    }

    public function includeAuthor(Post $post)
    {
        return $this->item($post->user, new UserTransformer());
    }

    public function includeLikers(Post $post)
    {
        return $this->collection($post->likers, new UserTransformer());
    }
}
