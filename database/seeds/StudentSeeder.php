<?php

use App\College;
use App\Department;
use App\Student;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('students')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $college_id = rand(1, College::all()->count());
        $departments = Department::where('college_id', $college_id)->get();
        Student::create([
            'name' => 'Mohamed Abdelhady Elshamy',
            'email' => 'hady@hady.com',
            'reg_no' => '17200237',
            'password' => Hash::make('123123123'), // password
            'period' => '7',
            'gpa' => '3.8',
            'college_id' => $college_id,
            'department_id' => rand($departments->first()->id, $departments->last()->id),
        ]);
        factory(Student::class, 10)->create();
    }
}