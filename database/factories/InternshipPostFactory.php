<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\InternshipPost;
use Faker\Generator as Faker;

$factory->define(InternshipPost::class, function (Faker $faker) {
    return [
        'internship_title' => $faker->jobTitle,
        'date' => $faker->date(),
    ];
});
