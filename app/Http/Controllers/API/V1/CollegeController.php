<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\College;
use App\Http\Controllers\Controller;
use App\Http\Resources\CollegeResource;
use Illuminate\Http\Request;

class CollegeController extends Controller
{

    use CoreJsonResponse;

    public function index()
    {
        $colleges = CollegeResource::collection(College::all());
        return $this->ok($colleges->resolve());
    }
}
