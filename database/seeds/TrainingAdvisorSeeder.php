<?php

use App\TrainingAdvisor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainingAdvisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('training_advisors')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $imagesArr = [
            'menna.jpg', 'mostafa.jpg'
        ];
        // factory(TrainingAdvisor::class, 50)->create();
        TrainingAdvisor::create([
            'advisor_name' => 'Mostafa Ibrahim',
            'advisor_title' => 'Marketing Prof.',
            'advisor_image' => $imagesArr[1],
            'advisor_bio' => 'Got his PHD in 2000',
            'advisor_email' => 'mostafa@gmail.com',
            'department_id' => 2
        ]);
        TrainingAdvisor::create([
            'advisor_name' => 'Menna Abdelhalim',
            'advisor_title' => 'Media Teacher Assistant',
            'advisor_image' => $imagesArr[0],
            'advisor_bio' => 'Got her bachelors in 2015',
            'advisor_email' => 'menna@gmail.com',
            'department_id' => 3
        ]);
    }
}
