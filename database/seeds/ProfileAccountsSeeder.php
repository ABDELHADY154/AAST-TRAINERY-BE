<?php

use App\ProfileAccounts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('profile_accounts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(ProfileAccounts::class, 10)->create();
    }
}
