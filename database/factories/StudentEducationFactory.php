<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use App\StudentEducation;
use Faker\Generator as Faker;

$factory->define(StudentEducation::class, function (Faker $faker) {
    return [
        'student_id' => rand(1, Student::all()->count()),
        'school_name' => $faker->company,
        'country' => $faker->country,
        'city' => $faker->city,
        'from' => $faker->date(),
        'to' => $faker->date(),
        'cred_url' => $faker->url,

    ];
});
