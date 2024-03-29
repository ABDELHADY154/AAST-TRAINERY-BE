<?php

use App\StudentAccount;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('student_accounts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        factory(StudentAccount::class, 100)->create();
    }
}
