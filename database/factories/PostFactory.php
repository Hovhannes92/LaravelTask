<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(10),
        'body' => $faker->sentence(50),
        'user_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});
