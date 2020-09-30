<?php

use App\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('departments')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Department::create([
            'dep_name' => 'Business Information systems',
            'college_id' => '1'
        ]);
        Department::create([
            'dep_name' => 'Accounting',
            'college_id' => '1'
        ]);
        Department::create([
            'dep_name' => 'Finance',
            'college_id' => '1'
        ]);
        Department::create([
            'dep_name' => 'Marketing',
            'college_id' => '1'
        ]);

        Department::create([
            'dep_name' => 'Media Managemenet',
            'college_id' => '1'
        ]);
        Department::create([
            'dep_name' => 'Humanities',
            'college_id' => '2'

        ]);
        Department::create([
            'dep_name' => 'Language & Translation',
            'college_id' => '2'
        ]);
        Department::create([
            'dep_name' => 'Media',
            'college_id' => '2'
        ]);
    }
}
