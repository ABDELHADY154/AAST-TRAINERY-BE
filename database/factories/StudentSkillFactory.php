<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use App\StudentSkill;
use Faker\Generator as Faker;

$factory->define(StudentSkill::class, function (Faker $faker) {
    return [
        'skill_name' => $faker->jobTitle,
        'exp_years' => $faker->numberBetween(1, 5),
        'level' => rand(1, 5),
        // 'justification' => $faker->text,
        'student_id' => rand(1, Student::all()->count())
    ];
});
