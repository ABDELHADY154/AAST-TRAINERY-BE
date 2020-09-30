<?php

use App\College;
use App\Review;
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
    }
}
