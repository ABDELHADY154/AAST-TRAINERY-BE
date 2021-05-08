<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\Admin\CompanyInternshipPostRequest;
use App\InternshipPost;
use App\Student;
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

    // public function store(CompanyInternshipPostRequest $request)
    // {

    //     $intern =  InternshipPost::create([
    //         'company_id' => $request->company_id,
    //         'internship_title' => $request->internship_title,
    //         'gender' => $request->gender,
    //         'type' => $request->type,
    //         'salary' => $request->salary,
    //         'application_deadline' => $request->application_deadline,
    //         'published_on' => now(),
    //         'desc' => $request->desc,
    //         'location' => $request->location,
    //         'location_url' => $request->location_url,
    //         'vacancy' => $request->vacancy,
    //         'post_type' => 'companyPost'
    //     ]);

    //     foreach ($request->reqs as $req) {
    //         $intern->internshipReqs()->create(['req' => $req, 'internship_post_id' => $intern->id]);
    //     }
    //     $deps = [];
    //     foreach ($request->deps as  $dep) {
    //         $deps[] = [
    //             'internship_post_id' => $intern->id,
    //             'student_department_id' => $dep
    //         ];
    //     }
    //     $intern->internDepartments()->attach($deps);
    //     return view('admin.compnayPost.show', ['intern' => $intern]);
    // }

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


    public function acceptStudent()
    {
        $student = Student::where('id', $_GET['s'])->first();
        foreach ($student->applications as $application) {
            if ($application->pivot->student_id == $student->id && $application->pivot->internship_post_id == $_GET['p']) {
                $student->applications()->updateExistingPivot($_GET['p'], ['application_status' => "accepted"]);
                $student->save();
                break;
            }
        }
        return redirect(route('companyInternshipPost.show', $_GET['p']));
    }

    public function rejectStudent()
    {
        $student = Student::where('id', $_GET['s'])->first();
        if ($student) {
            foreach ($student->applications as $application) {
                if ($application->pivot->student_id == $student->id && $application->pivot->internship_post_id == $_GET['p']) {
                    $student->applications()->updateExistingPivot($_GET['p'], ['application_status' => "rejected"]);
                    $student->save();
                    break;
                }
            }
            return redirect(route('companyInternshipPost.show', $_GET['p']));
        } else {
            return redirect(route('companyInternshipPost.index'));
        }
    }

    public function internAchieved()
    {
        $student = Student::where('id', $_GET['s'])->first();
        if ($student) {
            foreach ($student->applications as $application) {
                if ($application->pivot->student_id == $student->id && $application->pivot->internship_post_id == $_GET['p']) {
                    $student->applications()->updateExistingPivot($_GET['p'], ['application_status' => "achieved"]);
                    $student->save();
                    break;
                }
            }
            return redirect(route('companyInternshipPost.show', $_GET['p']));
        } else {
            return redirect(route('companyInternshipPost.index'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = InternshipPost::find($id);
        return view('admin.compnayPost.edit', ['intern' => $post]);
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
}
