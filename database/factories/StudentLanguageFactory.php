<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use App\StudentLanguage;
use Faker\Generator as Faker;

$factory->define(StudentLanguage::class, function (Faker $faker) {
    return [
        'language' => $faker->languageCode,
        'level' => rand(1, 5),
        'student_id' => rand(1, Student::all()->count()),
    ];
});
