<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use App\Student;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'student_id' => rand(1, Student::all()->count()),
        'rate' => $faker->randomFloat(2, 1, 5),
        'comment' => $faker->realText(),

    ];
});
