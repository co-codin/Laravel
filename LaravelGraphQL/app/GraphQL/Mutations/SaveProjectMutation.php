<?php

namespace App\GraphQL\Mutations;

use Auth;
use GraphQL;
use App\{Project, Task};
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class SaveProjectMutation extends Mutation
{
    protected $attributes = [
        'name' => 'SaveProjectMutation'
    ];

    public function args()
    {
        return [
            'project' => [ 'type' => GraphQL::type('projectInput') ]
        ];
    }

    public function type()
    {
        return Type::string();
    }

    public function resolve($root, $args)
    {
        $proj = $args['project'];

        $project = Project::create([
            'title' => $proj['title'],
            'description' => $proj['description'],
            'manager_id' => Auth::user()->id
        ]);

        $users = User::whereIn('id', $proj['users'])->get();

        foreach ($proj['tasks'] as $task) {
            Task::create([
                'title' => $task['title'],
                'description' => $task['description'],
                'user_id' => $task['userId'],
                'project_id' => $project->id,
                'status_code' => $task['statusCode']
            ]);
        }

        $project->user()->saveMany($users);

        return '';
    }
}
