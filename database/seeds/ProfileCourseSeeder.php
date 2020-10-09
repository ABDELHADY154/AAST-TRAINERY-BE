<?php

use App\ProfileCourse;
use Illuminate\Database\Seeder;

class ProfileCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProfileCourse::class, 20)->create();
    }
}
