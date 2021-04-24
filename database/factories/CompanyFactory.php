<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    $imagesArr = [
        'alexApp.png', 'elkhema.png', 'cib.jpg', 'creativo.png', 'easycash.png', 'matsmall.png',
    ];

    $image = $imagesArr[rand(0, 5)];

    return [
        'image' => $image,
        'company_name' => $faker->company,
        'address' => $faker->address,
        'company_field' => $faker->jobTitle,
        'company_desc' => $faker->text,
        'phone_number' => $faker->phoneNumber,
        'website' => $faker->url,
        'email' => $faker->email,
    ];
});
