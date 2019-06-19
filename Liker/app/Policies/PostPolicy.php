<?php

namespace App\Policies;

use App\{User, Post};
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function like(User $user, Post $post)
    {
        return $user->id !== $post->user_id;
        
        // if ($user->id !== $post->user_id) {
        //     return false;
        // }
        //
        // if ($post->maxLikesReachedFor($user)) {
        //     return false;
        // }
        //
        // return true;
    }
}
