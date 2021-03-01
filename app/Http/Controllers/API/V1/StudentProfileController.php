<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentGeneralInfoRequest;
use App\Http\Resources\StudentGeneralInfoResource;
use App\Http\Resources\StudentResource;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    use CoreJsonResponse;
    public function __construct()
    {
        $this->student = auth('api')->user();
    }

    public function generalInfo(StudentGeneralInfoRequest $request)
    {
        if ($request->file('image')) {
            $imageName = $request->file('image')->hashName();
            $path = $request->file('image')->storeAs(
                'public/images/avatars',
                $imageName
            );
        }
        // dd($request->all());
        $student = $this->student->update([
            'phone_number' => $request->input('phone_number'),
            'university' => $request->input('university'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'nationality' => $request->input('nationality'),
            'date_of_birth' => $request->input('date_of_birth'),
            'gender' => $request->input('gender'),
            'start_year' => $request->input('start_year'),
            'end_year' => $request->input('end_year'),
            'gpa' => $request->input('gpa'),
            'period' => $request->input('preiod'),
            'reg_no' => $request->input('reg_no'),
            'name' => $request->input('name'),
            'image' => $imageName
        ]);
        $this->student->save();
        return $this->created((new StudentGeneralInfoResource(auth('api')->user()))->resolve());
    }
    public function getGeneralInfo()
    {
        $student = $this->student;
        return $this->created((new StudentGeneralInfoResource($student))->resolve());
    }
}
