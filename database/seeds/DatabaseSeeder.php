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
        $this->call(StudentDepartmentSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(InternshipPostSeeder::class);
        $this->call(StudentEducationSeeder::class);
    }
}
