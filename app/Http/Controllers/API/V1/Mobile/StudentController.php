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

    /**
     * @OA\GET(
     *      path="/A/student/get-profile",
     *      operationId="AgetStudentProfile",
     *      description=" Get Student Profile ",
     *      summary="Get Student Profile ",
     *      tags={"A-Student Profile"},
     *     security={
     *          {"passport": {}},
     *     },
     *     @OA\Response(
     *          response="200",
     *          description="Student Data to success",
     *          @OA\JsonContent(ref="#/components/schemas/SuccessOkVirtual")
     *      ),
     *     @OA\Response(
     *          response="422",
     *          description="Validation Error",
     *           @OA\JsonContent(ref="#/components/schemas/Response422Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *     )
     * )
     */
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
