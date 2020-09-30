<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\College;
use App\Http\Controllers\Controller;
use App\Http\Resources\CollegeResource;
use App\Http\Resources\DepartmentResource;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    use CoreJsonResponse;

    public function __construct()
    {
        $this->student = auth('api')->user();
    }

    public function index()
    {
        $student = $this->student;
        $college = College::find($student->department->college_id);
        $departments = DepartmentResource::collection($college->departments);
        return $this->ok($departments->resolve());
    }
}
