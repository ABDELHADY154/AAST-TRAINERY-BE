<?php

namespace App\Http\Controllers\API\V1\Mobile;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\StudentResource;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use CoreJsonResponse;
    public function __construct()
    {
        $this->student = auth('api')->user();
    }


    public function getProfile()
    {
        $student = $this->student;
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
