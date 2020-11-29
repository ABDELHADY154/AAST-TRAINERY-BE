<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\StudentDepartment;
use Faker\Generator as Faker;

$factory->define(StudentDepartment::class, function (Faker $faker) {
    $depArr = [
        'Business Information Systems',
        'Marketing', 'Media Management',
        'Accounting & Finance', 'Political Science',
        'Media', 'Language and translation', 'Humanities'
    ];


    return [
        'department_name' => rand(1, count($depArr)),
    ];
});
