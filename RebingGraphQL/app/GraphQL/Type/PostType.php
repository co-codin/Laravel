<?php

namespace App\GraphQL\Type;

use GraphQL;
use App\Post;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Post',
        'description' => 'A post',
        'model' => Post::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the post'
            ],

            'title' => [
                'type' => Type::string(),
                'description' => 'The title of the post'
            ],

            'content' => [
                'type' => Type::string(),
                'description' => 'The content of post',
            ],

            'user' => [
                'type' => GraphQL::type('user'),
                'description'   => 'The user who created this post',
            ]
        ];
    }
}
