<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\InternshipPost;
use Faker\Generator as Faker;

$factory->define(InternshipPost::class, function (Faker $faker) {

    $gender = ['male', 'female', 'any'];
    $postType = ['full time', 'part time'];
    $salary = ['Paid', 'un paid'];
    return [
        'internship_title' => $faker->jobTitle,
        'published_on' => $faker->date(),
        'company_id' => rand(1, Company::all()->count()),
        'image' => $faker->imageUrl(),
        'vacancy' => rand(1, 10),
        'gender' => $gender[rand(0, 2)],
        'type' => $postType[rand(0, 1)],
        'salary' => $salary[rand(0, 1)],
        'application_deadline' => $faker->date(),
        'desc' => $faker->text(500)
    ];
});
