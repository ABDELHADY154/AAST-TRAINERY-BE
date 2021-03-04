<?php

use App\StudentCourse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('student_courses')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(StudentCourse::class, 100)->create();
    }
}
