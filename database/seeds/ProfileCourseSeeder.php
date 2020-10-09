<?php

use App\ProfileCourse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('profile_courses')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(ProfileCourse::class, 20)->create();
    }
}
