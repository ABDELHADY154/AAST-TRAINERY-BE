<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileCourseResource;
use App\ProfileCourse;
use Illuminate\Http\Request;

class ProfileCourseController extends Controller
{
    use CoreJsonResponse;

    public function __construct()
    {
        $this->student = auth('api')->user();
    }

    public function index()
    {
        $student = $this->student;
        $profile_course = ProfileCourseResource::collection(ProfileCourse::where('student_id', $student->id)->get());
        return $this->ok($profile_course->resolve());
    }
}
