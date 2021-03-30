<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\Admin\CompanyInternshipPostRequest;
use App\InternshipPost;
use App\StudentDepartment;
use App\StudentInterest;
use Illuminate\Http\Request;

class CompanyInternshipPostController extends Controller
{
    public function index()
    {
        $companyInternshipPosts = InternshipPost::where('post_type', 'companyPost')->get();
        return view('admin.compnayPost.index', ['posts' => $companyInternshipPosts]);
    }

    public function create(Request $request)
    {
        $companies = Company::all();
        $departments = StudentDepartment::all();
        return view('admin.compnayPost.create', ['companies' => $companies, 'departments' => $departments]);
    }

    public function store(CompanyInternshipPostRequest $request)
    {

        $intern =  InternshipPost::create([
            'company_id' => $request->company_id,
            'internship_title' => $request->internship_title,
            'gender' => $request->gender,
            'type' => $request->type,
            'salary' => $request->salary,
            'application_deadline' => $request->application_deadline,
            'published_on' => now(),
            'desc' => $request->desc,
            'location' => $request->location,
            'location_url' => $request->location_url,
            'vacancy' => $request->vacancy,
            'post_type' => 'companyPost'
        ]);

        foreach ($request->reqs as $req) {
            $intern->internshipReqs()->create(['req' => $req, 'internship_post_id' => $intern->id]);
        }
        $deps = [];
        foreach ($request->deps as  $dep) {
            $deps[] = [
                'internship_post_id' => $intern->id,
                'student_department_id' => $dep
            ];
        }
        $intern->internDepartments()->attach($deps);
        // dd($intern, $intern->internDepartments, $intern->internshipReqs, $request->deps);
        return view('admin.compnayPost.show', ['intern' => $intern]);
    }

    public function show($id)
    {
        $intern =  InternshipPost::where('id', $id)->first();
        return view('admin.compnayPost.show', ['intern' => $intern]);
    }

    public function destroy($id)
    {
        $intern =  InternshipPost::where('id', $id)->first();
        $intern->delete();
        return redirect(route('companyInternshipPost.index'));
    }
}
