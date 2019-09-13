<?php

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();

        $faker = Factory::create();

        User::create([
            'name' => 'Elijah',
            'email' => 'elijah@gmail.com',
            'password' => bcrypt('secret')
        ]);

        foreach (range(1, 10) as $i) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => str_random()
            ]);
        }
    }
}
