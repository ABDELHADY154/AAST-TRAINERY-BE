<?php

use App\StudentInterest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentInterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('student_interests')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(StudentInterest::class, 100)->create();
    }
}
