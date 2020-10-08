<?php

use App\WorkExperience;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('work_experiences')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(WorkExperience::class, 50)->create();
    }
}
