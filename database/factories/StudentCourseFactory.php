<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use App\StudentCourse;
use Faker\Generator as Faker;

$factory->define(StudentCourse::class, function (Faker $faker) {
    return [
        'course_name' => $faker->jobTitle,
        'course_provider' => $faker->company,
        'from' => $faker->date(),
        'to' => $faker->date(),
        'cred' => $faker->imageUrl(),
        'cred_url' => $faker->url,
        'student_id' => rand(1, Student::all()->count())
    ];
});
