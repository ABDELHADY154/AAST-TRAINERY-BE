<?php

use App\StudentNotification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('student_notifications')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(StudentNotification::class, 30)->create();
    }
}
