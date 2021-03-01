<?php

namespace App\Http\Controllers\API\V1\Mobile;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\StudentAcademicInfoRequest;
use App\Http\Requests\Mobile\StudentPersonalInfoRequest;
use App\Http\Resources\Mobile\StudentAcademicInfoResource;
use App\Http\Resources\Mobile\StudentPersonalInfoResource;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    use CoreJsonResponse;
    public function __construct()
    {
        $this->student = auth('api')->user();
    }
    public function personalInfo(StudentPersonalInfoRequest $request)
    {
        $this->student->update($request->all()); //auth('api')->user()))->resolve()
        $this->student->save();
        return $this->created((new StudentPersonalInfoResource($this->student))->resolve());
    }
    public function academicInfo(StudentAcademicInfoRequest $request)
    {
        $this->student->update($request->all()); //auth('api')->user()))->resolve()
        $this->student->save();
        return $this->created((new StudentAcademicInfoResource($this->student))->resolve());
    }
    public function getPersonalInfo()
    {
        return $this->created((new StudentPersonalInfoResource($this->student))->resolve());
    }
    public function getAcademicInfo()
    {
        return $this->created((new StudentAcademicInfoResource($this->student))->resolve());
    }
}
