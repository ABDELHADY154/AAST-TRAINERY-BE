<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\InternshipPost;
use Faker\Generator as Faker;

$factory->define(InternshipPost::class, function (Faker $faker) {

    $genderArr = ['male', 'female', 'any'];
    $postType = ['full time', 'part time'];
    $salaryArr = ['Paid', 'un paid'];
    $imagesArr = [
        'bis.jpg', 'clc.png', 'cmt.png', 'fad.jpg', 'mib.jpg', 'mm.jpg'
    ];
    $postTypes = ['companyPost', 'advisorPost', 'promotedPost', 'adsPost'];
    $endedArr = [true, false];

    $postT = $postTypes[rand(0, 3)];

    if ($postT == 'companyPost') {
        $internship_title = $faker->jobTitle;
        $published_on = $faker->date();
        $company_id = rand(null, rand(1, Company::all()->count()));
        $sponser_image = null; //$imagesArr[rand(0, 5)],
        $vacancy = rand(1, 10);
        $gender = $genderArr[rand(0, 2)];
        $type = $postType[rand(0, 1)];
        $salary = $salaryArr[rand(0, 1)];
        $application_deadline = $faker->date();
        $desc = $faker->text(500);
        $location = $faker->address;
        $ended = $endedArr[rand(0, 1)];
        $location_url = $faker->url;
    } elseif ($postT == 'advisorPost') {
        $internship_title = $faker->jobTitle;
        $published_on = $faker->date();
        $company_id = rand(null, rand(1, Company::all()->count()));
        $sponser_image = null; //$imagesArr[rand(0, 5)],
        $vacancy = rand(1, 10);
        $gender = $genderArr[rand(0, 2)];
        $type = $postType[rand(0, 1)];
        $salary = $salaryArr[rand(0, 1)];
        $application_deadline = $faker->date();
        $desc = $faker->text(500);
        $location = $faker->address;
        $ended = $endedArr[rand(0, 1)];
        $location_url = $faker->url;
    } elseif ($postT == 'promotedPost') {
        $internship_title = $faker->jobTitle;
        $published_on = $faker->date();
        $company_id = rand(null, rand(1, Company::all()->count()));
        $sponser_image = null; //$imagesArr[rand(0, 5)],
        $vacancy = rand(1, 10);
        $gender = $genderArr[rand(0, 2)];
        $type = $postType[rand(0, 1)];
        $salary = $salaryArr[rand(0, 1)];
        $application_deadline = $faker->date();
        $desc = $faker->text(500);
        $location = $faker->address;
        $ended = $endedArr[rand(0, 1)];
        $location_url = $faker->url;
    } elseif ($postT == 'adsPost') {
        $internship_title = null;
        $published_on = $faker->date();
        $company_id = rand(0, rand(1, Company::all()->count()));
        $sponser_image = $imagesArr[rand(0, 5)];
        $vacancy = null;
        $gender = null;
        $type = null;
        $salary = null;
        $application_deadline = null;
        $desc = $faker->text(500);
        $location = null;
        $ended = null;
        $location_url = null;
    }

    return [
        'post_type' => $postT,
        'internship_title' => $internship_title,
        'published_on' => $published_on,
        'company_id' => $company_id,
        'sponser_image' => $sponser_image,
        'vacancy' => $vacancy,
        'gender' => $gender,
        'type' => $type,
        'salary' => $salary,
        'application_deadline' => $application_deadline,
        'desc' => $desc,
        'location' => $location,
        'ended' => $ended,
        'location_url' => $location_url

    ];
});
