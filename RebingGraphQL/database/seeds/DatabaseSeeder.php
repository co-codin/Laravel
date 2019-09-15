<?php

use Illuminate\Support\Facades\DB;
use App\{
    Post, User, Project, Task
};
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // factory(Post::class, 20)->create();
        // $this->call(UsersTableSeeder::class);

        User::truncate();
        Project::truncate();
        Task::truncate();
        DB::table('project_user')->truncate();

        $admin = User::create([
            'name' => 'elijah',
            'email' => 'elijah@gmail.com',
            'password' => bcrypt('hellojava'),
            'api_token' => Str::random(60)
        ]);

        $user1 = User::create([
            'name' => 'ivan',
            'email' => 'ivan@gmail.com',
            'password' => bcrypt('hellojava'),
            'api_token' => Str::random(60)
        ]);

        $project = Project::create([
            'title' => 'test title',
            'description' => 'test description',
            'manager_id' => $admin->id
        ]);

        $task1 = Task::create([
            'title' => 'test title',
            'description' => 'test description',
            'user_id' => $admin->id,
            'project_id' => $project->id,
            'status_code' => 'COMP'
        ]);

        $task2 = Task::create([
            'title' => 'test title 2',
            'description' => 'test description 2',
            'user_id' => $user1->id,
            'project_id' => $project->id,
            'status_code' => 'OPEN'
        ]);

        $project->users()->saveMany([$admin, $user1]);
    }
}
