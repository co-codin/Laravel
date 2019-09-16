<?php

namespace App\GraphQL\Query;

use GraphQL;
use App\{Project, User};
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

    public function args()
    {
        return [
            'projectId' => ['type' => Type::int()]
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['projectId'])) {
            return Project::where('id', $args['projectId'])->get();
        }

        $projects = auth()->user()->projects()->get();
        $managed = Project::where('manager_id', auth()->id())->get();

        return $projects->merge($managed);
    }
}
