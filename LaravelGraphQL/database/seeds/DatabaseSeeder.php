<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\User;
use App\Project;
use App\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Project::truncate();
        Task::truncate();
        DB::table('project_user')->truncate();

        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('hellojava'),
            'api_token' => Str::random(60),
        ]);

        $user1 = User::create([
            'name' => 'elijah',
            'email' => 'elijah@gmail.com',
            'password' => bcrypt('hellojava'),
            'api_token' => Str::random(60),
        ]);

        $project = Project::create([
            'title' => 'Project Manager Development',
            'description' => 'Write the project manager application',
            'manager_id' => $admin->id
        ]);

        $task1 = Task::create([
            'title' => 'Seed Database',
            'description' => 'Seed the database with test data.',
            'user_id' => $admin->id,
            'project_id' => $project->id,
            'status_code' => 'COMP',
        ]);

        $task2 = Task::create([
            'title' => 'Complete Developmnet',
            'description' => 'Write the code yo.',
            'user_id' => $user1->id,
            'project_id' => $project->id,
            'status_code' => 'OPEN',
        ]);

        $project->users()->saveMany([$admin, $user1]);
    }
}
