<?php

use App\College;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('colleges')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        College::create([
            'college_name' => 'AAST - CMT',
            'logo' => 'cmt.png'
        ]);
        College::create([
            'college_name' => 'AAST - CLC',
            'logo' => 'clc.png'
        ]);
    }
}
