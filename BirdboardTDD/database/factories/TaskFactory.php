<?php

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence
    ];
});
