<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Comment::class, 3)->create(['parent_id' => null]);

        factory(Comment::class, 2)->create(['parent_id' => 1]);

        factory(Comment::class, 2)->create(['parent_id' => 2]);

        factory(Comment::class, 2)->create(['parent_id' => 6]);

        factory(Comment::class, 2)->create(['parent_id' => 8]);

        factory(Comment::class, 1)->create(['parent_id' => null]);
    }
}
