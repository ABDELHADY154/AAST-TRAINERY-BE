<?php

use App\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('companies')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $imagesArr = [
            'alexApp.png', 'elkhema.png', 'cib.jpg', 'creativo.png', 'easycash.png', 'matsmall.png',
        ];

        Company::create([
            'image' => $imagesArr[0],
            'company_name' => "Alexandria For Programming",
            'address' => "Bokla, Alexandria",
            'company_field' => "Computer Software",
            'company_desc' => "Alexandria for programming is a mobile app development company located in Alexandria,
            // it was established since 2008, and we have 11+ years of experience.",
            'phone_number' => 20100005214,
            'website' => "https://www.alexforprog.com/",
            'email' => "email1@email.com",
        ]);
        Company::create([
            'image' => $imagesArr[1],
            'company_name' => "Elkheta",
            'address' => "Smart Village, Cairo",
            'company_field' => "Education E-learning",
            'company_desc' => "we are a fast growing Edtech founded in 2017 we help students study their lessons online without the need of private tutors as we have produced hundreds of educational videos that gained millions of views.
            // We give students the full educational experience so that they can rely on us.",
            'phone_number' => 20100005214,
            'website' => "https://elkheta.com/",
            'email' => "email2@email.com",
        ]);
        Company::create([
            'image' => $imagesArr[2],
            'company_name' => "CIB",
            'address' => "Roushdy, Alexandria",
            'company_field' => "Banking",
            'company_desc' => "Commercial International Bank (CIB) is the leading private sector bank in Egypt, offering a broad range of financial products and services to its customers,
            // which include enterprises of all sizes, institutions, households and high-net worth individuals.",
            'phone_number' => 20100005214,
            'website' => "https://www.cibeg.com/English/Pages/default.aspx",
            'email' => "email3@email.com",
        ]);

        Company::create([
            'image' => $imagesArr[3],
            'company_name' => "Creativo",
            'address' => "Mandara, Alexandria",
            'company_field' => "Marketing and Advertising Agency",
            'company_desc' => "A creative and inspiring environment for freelancers, entrepreneurs, start-ups and small business of all areas.",
            'phone_number' => 20100005214,
            'website' => "https://creativocrew.com/",
            'email' => "email4@email.com",
        ]);

        Company::create([
            'image' => $imagesArr[4],
            'company_name' => "EasyKash",
            'address' => "Bokla, Alexandria",
            'company_field' => "Information Technology Services",
            'company_desc' => "EasyKash is one of the leading Egyptian financial technology companies specialized in providing innovative payment solutions for both businesses and consumers in partnership with National Bank of Egypt.",
            'phone_number' => 20100005214,
            'website' => "https://www.easykash.net/",
            'email' => "email5@email.com",
        ]);


        Company::create([
            'image' => $imagesArr[5],
            'company_name' => "Matsmall",
            'address' => "Abo Kier, Alexandria",
            'company_field' => "Architectural and Design Services - Furniture",
            'company_desc' => "Smart Design solutions, Branded Building Materials & Furniture specialist market place for easy shopping, Best discounted offers and User-friendly process for ease of designing and transactions.",
            'phone_number' => 20100005214,
            'website' => "https://matsmall.com/",
            'email' => "email6@email.com",
        ]);

        factory(Company::class, 2)->create();
    }
}
