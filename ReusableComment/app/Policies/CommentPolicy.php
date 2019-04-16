<?php

namespace App\Policies;

use App\Comment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function reply(User $user, Comment $comment)
    {
        return !$comment->parent_id;
    }

    public function update(User $user, Comment $comment)
    {
        return $user->id == $comment->user_id;
    }
}
