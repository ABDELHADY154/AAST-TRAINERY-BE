<?php

use App\InternshipPostDepartment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InternshipPostDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('internship_post_departments')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(InternshipPostDepartment::class, 100)->create();
    }
}
