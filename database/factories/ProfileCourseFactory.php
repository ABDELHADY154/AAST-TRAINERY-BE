<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProfileCourse;
use App\Student;
use Faker\Generator as Faker;

$factory->define(ProfileCourse::class, function (Faker $faker) {
    $course_category = ['BIS', 'Marketing', 'Media', 'Accounting & Finance', 'IT'];
    return [
        'course_name' => $faker->jobTitle,
        'course_category' => $course_category[rand(0, (count($course_category) - 1))],
        'course_url' => $faker->url,
        'start_date' => $faker->date(),
        'end_date' => $faker->date(),
        'student_id' => rand(1, Student::all()->count())
    ];
});
