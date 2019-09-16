<?php

namespace App\GraphQL\Mutation;

use Auth;
use App\{
    User, Project, Task
};
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class SaveProjectMutation extends Mutation
{
    protected $attributes = [
        'name' => 'SaveProjectMutation',
    ];

    public function args()
    {
        return [
            'project' => [ 'type' => GraphQL::type('projectType')]
        ];
    }

    public function type()
    {
        return Type::string();
    }

    public function resolve($root, $args)
    {
        $proj = $args['project'];

        dd($proj);

        $project = Project::create([
            'title' => $proj['title'],
            'description' => $proj['description'],
            'manager_id' => auth()->id()
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

        $project->users()->saveMany($users);

        return '';
    }
}
