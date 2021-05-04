<?php

use App\StudentWorkExperience;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentWorkExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('student_work_experiences')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(StudentWorkExperience::class, 100)->create();
    }
}
