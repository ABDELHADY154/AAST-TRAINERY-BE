<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentLangResource;
use App\Http\Resources\StudentSkillResource;
use App\StudentSkill;
use Illuminate\Http\Request;

class StudentLangController extends Controller
{
    use CoreJsonResponse;
    public function __construct()
    {
        $this->student = auth('api')->user();
    }

    public function index()
    {
        $student = $this->student;
        $langs = StudentLangResource::collection($student->langs);
        return $this->ok($langs->resolve());
    }
}
