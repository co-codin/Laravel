<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\{Comment, User};
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'body' => $faker->sentence(10)
    ];
});
