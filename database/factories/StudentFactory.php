<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\College;
use App\Department;
use App\Student;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(Student::class, function (Faker $faker) {
    $college_id = rand(1, College::all()->count());
    $departments = Department::where('college_id', $college_id)->get();
    // dd($departments->count);


    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'reg_no' => '17200123',
        'password' => Hash::make('123123123'), // password
        'period' => rand(1, 9),
        'gpa' => floatval(rand(1.5, 4)),
        'college_id' => $college_id,
        'department_id' => rand($departments->first()->id, $departments->last()->id),

    ];
});
