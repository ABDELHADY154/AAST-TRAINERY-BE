<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\InternshipPost;
use App\Student;
use Illuminate\Http\Request;

class InternshipPostController extends Controller
{
    use CoreJsonResponse;
    public function getLandingCounts()
    {
        $students = Student::all()->count();
        $internshipPosts = InternshipPost::all()->count();
        $applied = 500;
        $result = ['students' => $students, 'opportunities' => $internshipPosts, 'applied' => $applied];
        return $this->ok($result);
    }
}
