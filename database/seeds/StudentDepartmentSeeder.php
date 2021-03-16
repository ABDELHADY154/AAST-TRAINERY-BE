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
            'department_name' => 'Business Information Systems',
            'university_id' => 1
        ]);
        StudentDepartment::create([
            'department_name' => 'Marketing',
            'university_id' => 1
        ]);
        StudentDepartment::create([
            'department_name' => 'Media Management',
            'university_id' => 1
        ]);
        StudentDepartment::create([
            'department_name' => 'Accounting',
            'university_id' => 1
        ]);
        StudentDepartment::create([
            'department_name' => 'Finance',
            'university_id' => 1
        ]);
        StudentDepartment::create([
            'department_name' => 'Political Science',
            'university_id' => 1
        ]);
        StudentDepartment::create([
            'department_name' => 'Media',
            'university_id' => 2
        ]);
        StudentDepartment::create([
            'department_name' => 'Language and translation',
            'university_id' => 2
        ]);
        StudentDepartment::create([
            'department_name' => 'Humanities',
            'university_id' => 2
        ]);
    }
}
