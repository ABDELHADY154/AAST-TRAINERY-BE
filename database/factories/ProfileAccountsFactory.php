<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProfileAccounts;
use App\Student;
use Faker\Generator as Faker;

$factory->define(ProfileAccounts::class, function (Faker $faker) {
    return [
        'account_url_instagram' => $faker->url,
        'account_url_facebook' => $faker->url,
        'account_url_youtube' => $faker->url,
        'account_url_linkedin' => $faker->url,
        'account_url_github' => $faker->url,
        'account_url_behance' => $faker->url,
        'student_id' => rand(1, Student::all()->count()),

    ];
});
