<?php

use App\Company;
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
        $imagesArr = ['alexaps.jpg', 'cib.jpg', 'cib2.jpg', 'cib3.jpg', 'easy.jpg', 'elkheta.png'];


        InternshipPost::create([
            'published_on' => now()->toDate(),
            'company_id' =>  1,
            'sponser_image' => $imagesArr[0],
            'desc' => '',
            'post_type' => 'adsPost',

        ]);

        factory(InternshipPost::class, 20)->create();

        InternshipPost::create([
            'published_on' => now()->toDate(),
            'company_id' =>  3,
            'sponser_image' => $imagesArr[1],
            'desc' => "CIB supports environmental protection during World Earth Day for a more sustainable future! Given CIB's leading position in sustainable finance, the bank reaffirms its commitment to support environmental protection during the celebration of World Earth Day and highlights the actions it has taken to reduce the impacts of the climate change crisis and preserve the environment.",
            'post_type' => 'adsPost',

        ]);
        factory(InternshipPost::class, 5)->create();
        InternshipPost::create([
            'published_on' => now()->toDate(),
            'company_id' =>  3,
            'sponser_image' => $imagesArr[2],
            'desc' => "CIB supports environmental protection during World Earth Day for a more sustainable future! Given CIB's leading position in sustainable finance, the bank reaffirms its commitment to support environmental protection during the celebration of World Earth Day and highlights the actions it has taken to reduce the impacts of the climate change crisis and preserve the environment.",
            'post_type' => 'adsPost',

        ]);
        factory(InternshipPost::class, 25)->create();
        InternshipPost::create([
            'published_on' => now()->toDate(),
            'company_id' =>  3,
            'sponser_image' => $imagesArr[3],
            'desc' => "CIB supports environmental protection during World Earth Day for a more sustainable future! Given CIB's leading position in sustainable finance, the bank reaffirms its commitment to support environmental protection during the celebration of World Earth Day and highlights the actions it has taken to reduce the impacts of the climate change crisis and preserve the environment.",
            'post_type' => 'adsPost',

        ]);
        factory(InternshipPost::class, 5)->create();
        InternshipPost::create([
            'published_on' => now()->toDate(),
            'company_id' =>  5,
            'sponser_image' => $imagesArr[4],
            'desc' => "EasyKash makes it easy, safe and simple to sell your products online. Take your business to the top by providing a new sales channel for your customers with diverse payment options and the most convenient fees.",
            'post_type' => 'adsPost',

        ]);
        factory(InternshipPost::class, 25)->create();
        InternshipPost::create([
            'published_on' => now()->toDate(),
            'company_id' =>  5,
            'sponser_image' => $imagesArr[4],
            'desc' => "EasyKash makes it easy, safe and simple to sell your products online. Take your business to the top by providing a new sales channel for your customers with diverse payment options and the most convenient fees.",
            'post_type' => 'adsPost',

        ]);
        factory(InternshipPost::class, 5)->create();
        InternshipPost::create([
            'published_on' => now()->toDate(),
            'company_id' =>  2,
            'sponser_image' => $imagesArr[5],
            'desc' => "The educational plan website will help you with tickets for every first and second course, and for the next secondary ones. You can view the educational content by subscribing to a paid subscription with us.",
            'post_type' => 'adsPost',

        ]);
        factory(InternshipPost::class, 58)->create();
    }
}
