<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CollegeSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(WorkExperienceSeeder::class);
        $this->call(ProfileCourseSeeder::class);
        $this->call(StudentSkillSeeder::class);
        $this->call(StudentLanguageSeeder::class);
        $this->call(ProfileAccountsSeeder::class);
    }
}
