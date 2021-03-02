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


    /**
     * @OA\Get(
     *      path="/W/landingCount",
     *      operationId="getLandingPageCounterData",
     *      tags={"Landing Page"},
     *      summary="Get landing page counter data",
     *      description="Returns landing page counter data",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/SuccessOkVirtual")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *           @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *          @OA\JsonContent(ref="#/components/schemas/Response403Virtual")
     *      )
     *     )
     */
    public function getLandingCounts()
    {
        $students = Student::all()->count();
        $internshipPosts = InternshipPost::all()->count();
        $applied = 500;
        $result = ['students' => $students, 'opportunities' => $internshipPosts, 'applied' => $applied];
        return $this->ok($result);
    }
}
