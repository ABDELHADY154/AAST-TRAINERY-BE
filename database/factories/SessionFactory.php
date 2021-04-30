<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Session;
use Faker\Generator as Faker;

$factory->define(Session::class, function (Faker $faker) {
    $imgArr = ['session1.png', 'session2.png'];
    return [
        'title' => $faker->jobTitle,
        'desc' => $faker->text,
        'price' => rand(100, 500),
        'image' => $imgArr[rand(0, 1)]
    ];
});
