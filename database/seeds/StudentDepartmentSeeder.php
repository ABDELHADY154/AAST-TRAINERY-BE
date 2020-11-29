<?php

use App\StudentDepartment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('student_departments')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        StudentDepartment::create([
            'department_name' => 'Business Information Systems'
        ]);
        // StudentDepartment::create([
        //     'department_name' => 'Marketing'
        // ]);
        // StudentDepartment::create([
        //     'department_name' => 'Media Management'
        // ]);
        // StudentDepartment::create([
        //     'department_name' => 'Accounting & Finance'
        // ]);
        // StudentDepartment::create([
        //     'department_name' => 'Political Science'
        // ]);
        // StudentDepartment::create([
        //     'department_name' => 'Media'
        // ]);
        // StudentDepartment::create([
        //     'department_name' => 'Language and translation'
        // ]);
        // StudentDepartment::create([
        //     'department_name' => 'Humanities'
        // ]);
    }
}
