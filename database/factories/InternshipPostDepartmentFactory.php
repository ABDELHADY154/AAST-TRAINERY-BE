<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\InternshipPost;
use App\InternshipPostDepartment;
use App\StudentDepartment;
use Faker\Generator as Faker;

$factory->define(InternshipPostDepartment::class, function (Faker $faker) {
    return [
        'internship_post_id' => rand(1, InternshipPost::all()->count()),
        'student_department_id' => rand(1, StudentDepartment::all()->count())
    ];
});
