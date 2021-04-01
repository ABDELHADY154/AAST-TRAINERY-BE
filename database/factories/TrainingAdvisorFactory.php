<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\StudentDepartment;
use App\TrainingAdvisor;
use Faker\Generator as Faker;

$factory->define(TrainingAdvisor::class, function (Faker $faker) {
    $imagesArr = [
        'bis.jpg', 'clc.png', 'cmt.png', 'fad.jpg', 'mib.jpg', 'mm.jpg'
    ];
    return [
        'advisor_name' => $faker->name,
        'advisor_title' => $faker->jobTitle,
        'advisor_image' => $imagesArr[rand(0, 5)],
        'advisor_bio' => $faker->text,
        'advisor_email' => $faker->email,
        'department_id' => rand(1, StudentDepartment::all()->count())
    ];
});
