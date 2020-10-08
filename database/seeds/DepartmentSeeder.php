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
            'college_id' => '1',
            'logo' => 'bis.jpg'
        ]);
        Department::create([
            'dep_name' => 'Finance & Accounting',
            'college_id' => '1',
            'logo' => 'fad.jpg'

        ]);

        Department::create([
            'dep_name' => 'Marketing',
            'college_id' => '1',
            'logo' => 'mib.jpg'

        ]);

        Department::create([
            'dep_name' => 'Media Managemenet',
            'college_id' => '1',
            'logo' => 'mm.jpg'

        ]);
        Department::create([
            'dep_name' => 'Humanities',
            'college_id' => '2',
            'logo' => 'clc.png'

        ]);
        Department::create([
            'dep_name' => 'Language & Translation',
            'college_id' => '2',
            'logo' => 'clc.png'

        ]);
        Department::create([
            'dep_name' => 'Media',
            'college_id' => '2',
            'logo' => 'clc.png'

        ]);
    }
}
