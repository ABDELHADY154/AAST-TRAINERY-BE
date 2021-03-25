<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\InternshipPost;
use App\InternshipRequirement;
use Faker\Generator as Faker;

$factory->define(InternshipRequirement::class, function (Faker $faker) {
    return [
        "req" => $faker->text,
        "internship_post_id" => rand(1, InternshipPost::all()->count())
    ];
});
