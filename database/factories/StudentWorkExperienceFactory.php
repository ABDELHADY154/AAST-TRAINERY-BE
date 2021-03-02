<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use App\StudentWorkExperience;
use Faker\Generator as Faker;

$factory->define(StudentWorkExperience::class, function (Faker $faker) {
    return [
        'student_id' => rand(1, Student::all()->count()),
        'experience_type' => 'Internship',
        'job_title' => $faker->jobTitle,
        'company_name' => $faker->company,
        'company_website' => $faker->url,
        'country' => $faker->country,
        'city' => $faker->city,
        'from' => $faker->date(),
        'to' => $faker->date(),
        'currently_work' => $faker->boolean(),
        'cred_url' => $faker->url,
        'cred' => $faker->imageUrl()

    ];
});
