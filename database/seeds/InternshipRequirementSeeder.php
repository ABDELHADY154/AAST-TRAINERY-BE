<?php

use App\InternshipPostDepartment;
use App\InternshipRequirement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InternshipRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('internship_requirements')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        factory(InternshipRequirement::class, 500)->create();
    }
}
