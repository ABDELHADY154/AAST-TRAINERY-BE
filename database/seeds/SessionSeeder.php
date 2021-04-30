<?php

use App\Session;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('coaches')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(Session::class, 5)->create();
    }
}
