<?php

namespace App\Http\Controllers\API\V1\Mobile;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentEducationRequest;
use App\Http\Resources\StudentEducationResource;
use App\StudentEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentEducationController extends Controller
{
    use CoreJsonResponse;
    public function index()
    {

        $eduResource = StudentEducationResource::collection(StudentEducation::where('student_id', auth('api')->id())->get());
        return $this->ok($eduResource->resolve());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentEducationRequest $request)
    {
        if ($request->file('cred')) {
            $fileName = $request->file('cred')->hashName();
            $path = $request->file('cred')->storeAs(
                'public/files/student/educations',
                $fileName
            );
            $studentEdu = StudentEducation::create([
                'school_name' => $request->input('school_name'),
                'cred' => $fileName,
                'cred_url' => $request->input('cred_url'),
                'country' => $request->input('country'),
                'city' => $request->input('city'),
                'from' => $request->input('from'),
                'to' => $request->input('to'),
                'student_id' => auth('api')->id(),
            ]);
            return $this->created((new StudentEducationResource($studentEdu))->resolve());
        }

        $studentEdu = StudentEducation::create([
            'school_name' => $request->input('school_name'),
            'cred' => $request->input('cred'),
            'cred_url' => $request->input('cred_url'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'student_id' => auth('api')->id(),
        ]);
        return $this->created((new StudentEducationResource($studentEdu))->resolve());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentEducation = StudentEducation::find($id);
        if (!$studentEducation) {
            return  $this->notFound(['message' => 'education not found']);
        }
        if ($studentEducation->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        return $this->ok((new StudentEducationResource($studentEducation))->resolve());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentEducationRequest $request, $id)
    {

        $studentEdu = StudentEducation::find($id);
        if (!$studentEdu) {
            return  $this->notFound(['message' => 'education not found']);
        }
        if ($studentEdu->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        if ($request->file('cred')) {
            $fileName = $request->file('cred')->hashName();
            $path = $request->file('cred')->storeAs(
                'public/files/student/educations',
                $fileName
            );

            $studentEdu->update([
                'school_name' => $request->input('school_name'),
                'cred' => $fileName,
                'cred_url' => $request->input('cred_url'),
                'country' => $request->input('country'),
                'city' => $request->input('city'),
                'from' => $request->input('from'),
                'to' => $request->input('to'),
                'student_id' => auth('api')->id(),
            ]);
            $studentEdu->save();

            return $this->created((new StudentEducationResource($studentEdu))->resolve());
        }
        $studentEdu->update([
            'school_name' => $request->input('school_name'),
            'cred_url' => $request->input('cred_url'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'student_id' => auth('api')->id(),
        ]);
        $studentEdu->save();
        return $this->created((new StudentEducationResource($studentEdu))->resolve());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentEdu = StudentEducation::find($id);

        if (!$studentEdu) {
            return  $this->notFound(['message' => 'education not found']);
        }
        if ($studentEdu->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        if ($studentEdu->cred !== null) {
            Storage::delete(
                'public/files/student/educations/' .
                    $studentEdu->cred
            );
        }
        $studentEdu->destroy($id);
        return $this->ok(['message' => 'Deleted']);
    }
}
