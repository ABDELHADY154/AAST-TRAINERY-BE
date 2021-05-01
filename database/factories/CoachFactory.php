<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coach;
use Faker\Generator as Faker;

$factory->define(Coach::class, function (Faker $faker) {

    $imgArr = [
        'coach1.jpg', 'coach2.jpg', 'coach3.jpg', 'coach4.jpg', 'coach5.jpg', 'coach6.jpg',
        'coach7.jpg', 'coach8.jpg', 'coach9.jpg', 'coach10.jpg', 'coach11.jpg', 'coach12.jpg'
    ];

    return [
        'name' => $faker->name,
        'bio' => $faker->text,
        'job_title' => $faker->jobTitle,
        'fb_url' => $faker->url,
        'in_url' => $faker->url,
        'y_url' => $faker->url,
        'insta_url' => $faker->url,
        'image' => $imgArr[rand(0, 11)]
    ];
});
