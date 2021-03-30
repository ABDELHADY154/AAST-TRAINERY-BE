<?php

namespace App\Http\Controllers;

use App\Company;
use App\InternshipPost;
use App\StudentInterest;
use Illuminate\Http\Request;

class CompanyInternshipPostController extends Controller
{
    public function index()
    {
        $companyInternshipPosts = InternshipPost::where('company_id', '!=', 0)->get();
        return view('admin.compnayPost.index', ['posts' => $companyInternshipPosts]);
    }

    public function create(Request $request)
    {
        $companies = Company::all();
        $studentInterests = StudentInterest::all();
        return view('admin.compnayPost.create', ['companies' => $companies, 'studentInterests' => $studentInterests]);
    }

    public function store(Request $request)

    {

        dd($request->all());
        //// 'internship_title' => $faker->jobTitle,
        //// 'published_on' => $faker->date(),
        //// 'company_id' => rand(null, rand(1, Company::all()->count())),
        //// 'sponser_image' => $imagesArr[rand(0, 5)],
        //// 'vacancy' => rand(1, 10),
        //// 'gender' => $gender[rand(0, 2)],
        //// 'type' => $postType[rand(0, 1)],
        //// 'salary' => $salary[rand(0, 1)],
        //// 'application_deadline' => $faker->date(),
        //// 'desc' => $faker->text(500),
        //// 'location' => $faker->address,
    }
}
