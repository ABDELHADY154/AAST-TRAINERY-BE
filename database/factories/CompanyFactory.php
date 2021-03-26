<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    $imagesArr = [
        'bis.jpg', 'clc.png', 'cmt.png', 'fad.jpg', 'mib.jpg', 'mm.jpg'
    ];
    return [
        'image' => $imagesArr[rand(0, 5)], //asset('storage/images/logo/' . ),
        'company_name' => $faker->company,
        'address' => $faker->address,
        'company_field' => $faker->jobTitle,
        'company_desc' => $faker->text(500),
        'phone_number' => $faker->phoneNumber,
        'website' => $faker->url,
        'email' => $faker->email,
    ];
});
