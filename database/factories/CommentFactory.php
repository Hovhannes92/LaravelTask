<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence(50),
        'user_id' => $faker->numberBetween($min = 1, $max = 50),
        'post_id' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
