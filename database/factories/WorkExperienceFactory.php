<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use App\WorkExperience;
use Faker\Generator as Faker;

$factory->define(WorkExperience::class, function (Faker $faker) {
    $experience_types = ['internship', 'part time job'];
    return [
        'experience_type' => $experience_types[rand(0, (count($experience_types) - 1))],
        'job_title' => $faker->jobTitle,
        'company_name' => $faker->company,
        'company_website' => $faker->url,
        'country' => $faker->country,
        'city' => $faker->city,
        'start_date' => $faker->date(),
        'end_date' => $faker->date(),
        'exp_url' => $faker->url,
        'student_id' => rand(1, Student::all()->count())
    ];
});
