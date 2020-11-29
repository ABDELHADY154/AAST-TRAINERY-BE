<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentDepartmentResource;
use App\StudentDepartment;
use Illuminate\Http\Request;

class StudentDepartmentController extends Controller
{
    use CoreJsonResponse;


    public function index()
    {
        $departments = StudentDepartmentResource::collection(StudentDepartment::all());
        return $this->ok($departments->resolve());
    }
}
