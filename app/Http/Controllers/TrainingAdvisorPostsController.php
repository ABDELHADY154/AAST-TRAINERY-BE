<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\Admin\CompanyInternshipPostRequest;
use App\InternshipPost;
use App\StudentDepartment;
use App\TrainingAdvisor;
use Illuminate\Http\Request;

class TrainingAdvisorPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advisorInternship = InternshipPost::where('post_type', 'advisorPost')->get();
        return view('admin.advisorPost.index', ['posts' => $advisorInternship]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $departments = StudentDepartment::all();
        return view('admin.advisorPost.create', ['companies' => $companies, 'departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            'post_type' => 'advisorPost',
            'training_advisor_id' => rand(1, TrainingAdvisor::all()->count())
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
        return view('admin.advisorPost.show', ['intern' => $intern]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $intern =  InternshipPost::where('id', $id)->first();
        return view('admin.advisorPost.show', ['intern' => $intern]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $intern =  InternshipPost::where('id', $id)->first();
        $intern->delete();
        return redirect(route('trainingAdvisorPost.index'));
    }
}
