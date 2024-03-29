<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\InternshipPost;
use App\TrainingAdvisor;
use Faker\Generator as Faker;

$factory->define(InternshipPost::class, function (Faker $faker) {

    $genderArr = ['male', 'female', 'any'];
    $postType = ['full time', 'part time'];
    $salaryArr = ['Paid', 'un paid'];
    $imagesArr = [
        'bis.jpg', 'clc.png', 'cmt.png', 'fad.jpg', 'mib.jpg', 'mm.jpg'
    ];
    $postTypes = ['companyPost', 'advisorPost', 'promotedPost'];
    $endedArr = [true, false];

    $postT = $postTypes[rand(0, 2)];

    if ($postT == 'companyPost') {
        $internship_title = $faker->jobTitle;
        $published_on = $faker->date();
        $company_id = rand(1, Company::all()->count());
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
        $advisor_id = null;
    } elseif ($postT == 'advisorPost') {
        $internship_title = $faker->jobTitle;
        $published_on = $faker->date();
        $company_id = rand(1, Company::all()->count());
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
        $advisor_id = rand(1, TrainingAdvisor::all()->count());
    } elseif ($postT == 'promotedPost') {
        $internship_title = $faker->jobTitle;
        $published_on = $faker->date();
        $company_id = rand(1, Company::all()->count());
        $sponser_image = null; //$imagesArr[rand(0, 5)],
        $vacancy = rand(1, 10);
        $gender = $genderArr[rand(0, 2)];
        $type = $postType[rand(0, 1)];
        $salary = $salaryArr[rand(0, 1)];
        $application_deadline = $faker->date();
        $desc = $faker->text(500);
        $location = $faker->address;
        $ended = $endedArr[rand(0, 1)];
        $advisor_id = null;
        $location_url = $faker->url;
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
        'location_url' => $location_url,
        'training_advisor_id' => $advisor_id
    ];
});
