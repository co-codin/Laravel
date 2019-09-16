<?php

namespace App\GraphQL\Query;

use GraphQL;
use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'UsersQuery',
        'description' => 'Retrieves users',
    ];


    public function type()
    {
        return Type::listOf(GraphQL::type('user'));
    }

    public function resolve($root, $args)
    {
        return User::all();
    }
}
