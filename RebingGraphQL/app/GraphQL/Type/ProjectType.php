<?php

namespace App\GraphQL\Type;

use GraphQL;
use App\Project;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProjectType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Project',
        'description' => 'A project',
        'model' => Project::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The project id'
            ],

            'title' => [
                'type' => Type::nonNull(Type::string())
            ],

            'description' => [
                'type' => Type::nonNull(Type::string())
            ]
        ];
    }
}
