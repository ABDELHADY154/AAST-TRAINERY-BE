<?php

use App\StudentSkill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('student_skills')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(StudentSkill::class, 100)->create();
    }
}
