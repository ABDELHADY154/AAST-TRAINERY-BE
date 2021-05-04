<?php

namespace App\Http\Controllers;

use App\StudentDepartment;
use App\TrainingAdvisor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TrainingAdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.advisor.index', ['advisors' => TrainingAdvisor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = StudentDepartment::all();
        return view('admin.advisor.create', ['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'advisor_name' => ['required', 'string'],
            'advisor_image' => ['required', 'file', 'mimes:png,jpg,jpeg'],
            'department_id' => ['required', 'integer', 'exists:student_departments,id'],
            'advisor_bio' => ['nullable', 'string'],
            'advisor_email' => ['required', 'email', 'unique:training_advisors,advisor_email'],
            'advisor_title' => ['required', 'string'],
        ]);
        $fileName = $request->file('advisor_image')->hashName();
        $path = $request->file('advisor_image')->storeAs(
            'public/images/advisorsLogo',
            $fileName
        );

        $advisor = TrainingAdvisor::create([
            'advisor_name' => $request->advisor_name,
            'advisor_image' => $fileName,
            'department_id' => $request->department_id,
            'advisor_bio' => $request->advisor_bio,
            'advisor_email' => $request->advisor_email,
            'advisor_title' => $request->advisor_title,
        ]);

        return view('admin.advisor.show', ['advisor' => $advisor]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrainingAdvisor  $trainingAdvisor
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingAdvisor $trainingAdvisor)
    {
        return view('admin.advisor.show', ['advisor' => $trainingAdvisor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrainingAdvisor  $trainingAdvisor
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingAdvisor $trainingAdvisor)
    {
        $departments = StudentDepartment::all();
        return view('admin.advisor.edit', ['departments' => $departments, 'trainingAdvisor' => $trainingAdvisor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrainingAdvisor  $trainingAdvisor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingAdvisor $trainingAdvisor)
    {
        $request->validate([
            'advisor_name' => ['required', 'string'],
            'advisor_image' => ['file', 'mimes:png,jpg,jpeg'],
            'department_id' => ['required', 'integer', 'exists:student_departments,id'],
            'advisor_bio' => ['nullable', 'string'],
            'advisor_email' => ['required', 'email', Rule::unique('training_advisors')->ignore($trainingAdvisor->id)],
            'advisor_title' => ['required', 'string'],
        ]);

        if ($request->hasFile('advisor_image')) {
            $fileName = $request->file('advisor_image')->hashName();
            $path = $request->file('advisor_image')->storeAs(
                'public/images/advisorsLogo',
                $fileName
            );
            $trainingAdvisor->update([
                'advisor_name' => $request->advisor_name,
                'advisor_image' => $fileName,
                'department_id' => $request->department_id,
                'advisor_bio' => $request->advisor_bio,
                'advisor_email' => $request->advisor_email,
                'advisor_title' => $request->advisor_title,
            ]);

            return view('admin.advisor.show', ['advisor' => $trainingAdvisor]);
        } else {
            $trainingAdvisor->update([
                'advisor_name' => $request->advisor_name,
                'department_id' => $request->department_id,
                'advisor_bio' => $request->advisor_bio,
                'advisor_email' => $request->advisor_email,
                'advisor_title' => $request->advisor_title,
            ]);
            return view('admin.advisor.show', ['advisor' => $trainingAdvisor]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrainingAdvisor  $trainingAdvisor
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingAdvisor $trainingAdvisor)
    {
        $trainingAdvisor->delete();
        return redirect(route('trainingAdvisor.index'));
    }
}
