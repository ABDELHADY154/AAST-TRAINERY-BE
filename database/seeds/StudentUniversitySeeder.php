<?php

use App\StudentUniversity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentUniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('student_universities')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        StudentUniversity::create([
            'university_name' => 'AAST CMT'
        ]);
        StudentUniversity::create([
            'university_name' => 'AAST CLC'
        ]);
    }
}
