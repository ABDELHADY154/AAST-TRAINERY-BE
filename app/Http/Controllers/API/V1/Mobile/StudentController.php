<?php

namespace App\Http\Controllers\API\V1\Mobile;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\StudentExperienceReource;
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
     *      path="/A/student/get-profilePersonal",
     *      operationId="AgetStudentProfilePersonal",
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

    /**
     * @OA\GET(
     *      path="/A/student/get-profileExperience",
     *      operationId="AgetStudentProfileExperience",
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
    public function getProfileExperience()
    {
        $student = $this->student;
        switch (true) {
            case $student:
                $data = (new StudentExperienceReource($student))->resolve();
                break;
            default:
                return $this->forbidden();
        }
        return $this->ok($data);
    }
    /**
     * @OA\GET(
     *      path="/A/student/studentImg",
     *      operationId="AgetStudentImage",
     *      description=" Get Student Image ",
     *      summary="Get Student Image ",
     *      tags={"A-Student Profile"},
     *     security={
     *          {"passport": {}},
     *     },
     *
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
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *     )
     * )
     */
    public function getImg()
    {
        $student = $this->student;
        return $this->ok(['fullName' => $student->name, 'image' => asset('storage/images/avatars/' . $student->image)]);
    }
}
