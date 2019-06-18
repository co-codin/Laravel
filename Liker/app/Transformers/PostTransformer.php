<?php

namespace App\Transformers;

use App\Post;
use League\Fractal\TransformerAbstract;
use App\Transformers\{UserTransformer, PostUserTransformer};

class PostTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'author', 'user', 'likers'
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

    public function includeUser(Post $post)
    {
        return $this->item($post, new PostUserTransformer());
    }

    public function includeLikers(Post $post)
    {
        return $this->collection($post->likers, new UserTransformer());
    }
}
