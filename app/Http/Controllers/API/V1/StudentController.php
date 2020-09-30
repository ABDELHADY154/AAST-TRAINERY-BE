<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use CoreJsonResponse;
    public function __construct()
    {
        $this->student = auth('api')->user();
    }

    public function index()
    {
        $students = StudentResource::collection(Student::all());
        return $this->ok($students->resolve());
    }

    public function getProfile()
    {
        $student = $this->student;
        // Student::where('id', auth('api')->id())->first();
        switch (true) {
            case $student:
                $data = (new StudentResource($student))->resolve();
                break;
            default:
                return $this->forbidden();
        }
        return $this->ok($data);
    }
}
