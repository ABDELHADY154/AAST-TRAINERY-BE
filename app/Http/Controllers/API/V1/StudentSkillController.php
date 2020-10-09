<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentSkillResource;
use App\StudentSkill;
use Illuminate\Http\Request;

class StudentSkillController extends Controller
{
    use CoreJsonResponse;
    public function __construct()
    {
        $this->student = auth('api')->user();
    }

    public function index()
    {
        // dd(1);
        $student = $this->student;
        $skills = StudentSkillResource::collection(StudentSkill::where('student_id', $student->id)->get());
        return $this->ok($skills->resolve());
    }
}
