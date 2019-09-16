<?php

namespace App\GraphQL\Query;

use GraphQL;
use App\Project;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class ProjectsQuery extends Query
{
    protected $attributes = [
        'name' => 'Projects query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('project'));
    }

    public function resolve($root, $args)
    {
        return Project::all();
    }
}
