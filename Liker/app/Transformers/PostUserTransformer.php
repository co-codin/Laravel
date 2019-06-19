<?php

namespace App\Transformers;

use App\Post;
use League\Fractal\TransformerAbstract;

class PostUserTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'owner',
        'liked',
        'likes_remaining'
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Post $post)
    {
        return [
            //
        ];
    }

    public function includeOwner(Post $post)
    {
        return $this->primitive($post, function ($post) {
            return optional(auth()->user())->id === $post->user_id;
        });
    }

    public function includeLiked(Post $post)
    {
        return $this->primitive($post, function ($post) {
            if (!$user = auth()->check()) {
                return false;
            }

            return $post->likes->contains($user);
        });
    }

    public function includeLikesRemaining(Post $post)
    {
        return $this->primitive($post, function ($post) {
            if (!$user = auth()->user()) {
                return false;
            }

            return $post->likesRemainingFor($user);
        });
    }
}
