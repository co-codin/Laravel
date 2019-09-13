<?php

namespace App\GraphQL\Types;

use App\User;

class UserType
{
    public function jobs(User $user)
    {
        return $user->jobs()->get();
    }
}
