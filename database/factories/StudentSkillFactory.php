<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use App\StudentSkill;
use Faker\Generator as Faker;

$factory->define(StudentSkill::class, function (Faker $faker) {
    return [
        'skill_name' => $faker->jobTitle,
        'years_of_exp' => rand(1, 5),
        'student_id' => rand(1, Student::all()->count())
    ];
});
