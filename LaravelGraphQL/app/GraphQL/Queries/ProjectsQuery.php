<?php

namespace App\GraphQL\Queries;

use Auth;
use App\User;
use App\Project;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class ProjectsQuery extends Query
{
    protected $attributes = [
        'name' => 'The projects queru',
        'description' => 'Retrieves projects',
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
