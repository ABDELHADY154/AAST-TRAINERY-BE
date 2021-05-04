<?php

use App\StudentLanguage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('student_languages')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(StudentLanguage::class, 50)->create();
    }
}
