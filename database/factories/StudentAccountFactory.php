<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use App\StudentAccount;
use Faker\Generator as Faker;

$factory->define(StudentAccount::class, function (Faker $faker) {
    return [
        'website' => $faker->url,
        'facebook' => $faker->url,
        'instagram' => $faker->url,
        'youtube' => $faker->url,
        'linkedin' => $faker->url,
        'behance' => $faker->url,
        "github" => $faker->url,
        'student_id' => rand(1, Student::all()->count())
    ];
});
