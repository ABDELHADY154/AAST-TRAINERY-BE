<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use App\StudentInterest;
use Faker\Generator as Faker;

$factory->define(StudentInterest::class, function (Faker $faker) {
    return [
        'interest' => $faker->jobTitle,
        'student_id' => rand(1, Student::all()->count())
    ];
});
