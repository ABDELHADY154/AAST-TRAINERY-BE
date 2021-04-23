<?php

use App\InternshipPost;
use App\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class StudentInternshipPostApplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('student_internship_post_apply')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i = 0; $i < 50; $i++) {

            DB::table('student_internship_post_apply')->insert([
                'internship_post_id' => rand(1, InternshipPost::all()->count()),
                'student_id' => rand(1, Student::all()->count()),
                'application_date' => now()->toDate(),
            ]);
        }
    }
}
