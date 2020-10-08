<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkExperienceResource;
use App\WorkExperience;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    use CoreJsonResponse;
    public function __construct()
    {
        $this->student = auth('api')->user();
    }

    public function index()
    {

        $student = $this->student;
        $work_experiences = WorkExperienceResource::collection(WorkExperience::where('student_id', $student->id)->get());
        return $this->ok($work_experiences->resolve());
    }
}
