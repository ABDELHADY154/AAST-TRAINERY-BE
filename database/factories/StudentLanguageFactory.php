<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use App\StudentLanguage;
use Faker\Generator as Faker;

$factory->define(StudentLanguage::class, function (Faker $faker) {
    $langs = [
        'Arabic',
        'Chinese',
        'Czech',
        'Danish',
        'Dutch',
        'English',
        'French',
        'Hindi',
        'Italian',
        'Japanese',
        'Korean',
        'Russian',
        'Turkish',
        'Ukrainian',
    ];
    return [
        'language' => $langs[rand(0, (count($langs) - 1))],
        'level' => rand(1, 5),
        'student_id' => rand(1, Student::all()->count()),
    ];
});
