<?php

use App\InternshipPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InternshipPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('internship_posts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        factory(InternshipPost::class, 100)->create();
    }
}
