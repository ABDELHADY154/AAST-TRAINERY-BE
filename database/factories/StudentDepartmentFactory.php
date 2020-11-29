<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\StudentDepartment;
use Faker\Generator as Faker;

$factory->define(StudentDepartment::class, function (Faker $faker) {
    return [
        'department_name' => 'Business Information Systems',
    ];
});
