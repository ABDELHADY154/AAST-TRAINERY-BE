<?php

use App\StudentEducation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('student_education')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(StudentEducation::class, 100)->create();
    }
}
