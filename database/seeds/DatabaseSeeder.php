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
        $this->call(StudentUniversitySeeder::class);
        $this->call(StudentDepartmentSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StudentEducationSeeder::class);
        $this->call(StudentWorkExperienceSeeder::class);
        $this->call(StudentCourseSeeder::class);
        $this->call(StudentSkillSeeder::class);
        $this->call(StudentLanguageSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(TrainingAdvisorSeeder::class);
        $this->call(InternshipPostSeeder::class);
        $this->call(StudentInterestSeeder::class);
        $this->call(InternshipRequirementSeeder::class);
        $this->call(InternshipPostDepartmentSeeder::class);
    }
}
