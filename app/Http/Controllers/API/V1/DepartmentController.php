<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\College;
use App\Http\Controllers\Controller;
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
        dd($college->departments);
    }
}
