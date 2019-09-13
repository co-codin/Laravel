<?php

namespace App\GraphQL\Queries;

use App\User;

class UserQuery
{
    public function all()
    {
        return User::all();
    }

    public function find($root, array $args)
    {
        return User::find($args['id']);
    }
}
