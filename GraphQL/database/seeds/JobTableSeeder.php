<?php

use Faker\Factory;
use App\{Job, User};
use Illuminate\Database\Seeder;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::truncate();
        Job::unguard();

        $faker = Factory::create();

        User::all()->each(function ($user) use ($faker) {
            foreach (range(1, 5) as $i) {
                Job::create([
                    'user_id' => $user->getKey(),
                    'title' => $faker->sentence
                ]);
            }
        });
    }
}
