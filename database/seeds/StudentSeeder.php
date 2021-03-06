<?php

use App\College;
use App\Department;
use App\Student;
use App\StudentDepartment;
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

        // $college_id = 1;
        // $departments = Department::where('college_id', $college_id)->get();
        Student::create([
            'name' => 'Mohamed Abdelhady Elshamy',
            'email' => 'hady@hady.com',
            'image' => 'MaleAvatar.png',
            'reg_no' => '17200237',
            'password' => Hash::make('Trainery@123'), // password
            'period' => '7',
            'start_year' => 2017,
            'end_year' => 2021,
            'gpa' => '3.8',
            // 'college_id' => $college_id,
            'department_id' => 1,
            'gender' => 'male',
            'date_of_birth' => '1997-04-15',
            'nationality' => 'Egypt',
            'country' => 'Egypt',
            'city' => 'Alexandria',
            'university' => 'Arab academy for science and technology',
            'phone_number' => '+201000015894',
            'profile_updated' => 1,
            "profile_score" => 0.65,
        ]);
        Student::create([
            'name' => 'yasmin sabry',
            'email' => 'yasminsabry@student.aast.edu',
            'image' => 'FemaleAvatar.png',
            'reg_no' => '17200111',
            'password' => Hash::make('Trainery@123'), // password
            'period' => '8',
            'start_year' => 2017,
            'end_year' => 2021,
            'gpa' => '3.9',
            // 'college_id' => $college_id,
            'department_id' => 1,
            'gender' => 'female',
            'date_of_birth' => '1999-04-15',
            'nationality' => 'Egypt',
            'country' => 'Egypt',
            'city' => 'Alexandria',
            'university' => 'Arab academy for science and technology',
            'phone_number' => '+201000015894',
            'profile_updated' => 0,
            "profile_score" => 0.10,
        ]);
        Student::create([
            'name' => 'basma mostafa',
            'email' => 'basma@gmail.com',
            'image' => 'FemaleAvatar.png',
            'reg_no' => '17200111',
            'password' => Hash::make('Trainery@123'), // password
            'period' => '8',
            'start_year' => 2017,
            'end_year' => 2021,
            'gpa' => '3.9',
            // 'college_id' => $college_id,
            'department_id' => 1,
            'gender' => 'female',
            'date_of_birth' => '1999-04-15',
            'nationality' => 'Egypt',
            'country' => 'Egypt',
            'city' => 'Alexandria',
            'university' => 'Arab academy for science and technology',
            'phone_number' => '+201000015894',
            'profile_updated' => 0,
            "profile_score" => 0.10,
        ]);
        Student::create([
            'name' => 'Mohanad Elmaghraby',
            'email' => 'me8a.mohanad@gmail.com',
            'image' => 'MaleAvatar.png',
            'reg_no' => '17200111',
            'password' => Hash::make('123456789'), // password
            'period' => '7',
            'start_year' => 2017,
            'end_year' => 2021,
            'gpa' => '3.0',
            // 'college_id' => $college_id,
            'department_id' => 1,
            'gender' => 'male',
            'date_of_birth' => '1997-04-20',
            'nationality' => 'Egypt',
            'country' => 'Egypt',
            'city' => 'Alexandria',
            'university' => 'Arab academy for science and technology',
            'phone_number' => '+201000015894',
            'profile_updated' => 0,
            "profile_score" => 0.10,
        ]);
        factory(Student::class, 10)->create();
    }
}
