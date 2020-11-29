<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\College;
use App\Department;
use App\Student;
use App\StudentDepartment;
use Faker\Generator as Faker;
// use Faker\Provider\ar_SA\Address;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(Student::class, function (Faker $faker) {
    // $college_id = rand(1, College::all()->count());
    // $departments = Department::where('college_id', $college_id)->get();

    $gender = $faker->randomElement(['male', 'female']);
    $city = $faker->city;
    // $city =  $faker->addProvider(new Address($faker));
    // $faker->state; // will give you only Australian states

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'reg_no' => '17200123',
        'password' => Hash::make('123123123'),
        'period' => rand(1, 9),
        'start_year' => $faker->year(2016),
        'end_year' => $faker->year(),
        'gpa' => floatval(rand(1.5, 4)),
        // 'college_id' => $college_id,
        'department_id' => rand(1, StudentDepartment::all()->count()),

        // 'department_id' => rand($departments->first()->id, $departments->last()->id),
        'gender' => $gender,
        'date_of_birth' => $faker->date(),
        'nationality' => $faker->country,
        'country' => $faker->country,
        'city' => $faker->city,
        'address' => $faker->address,
        'phone_number' => $faker->phoneNumber

    ];
});
