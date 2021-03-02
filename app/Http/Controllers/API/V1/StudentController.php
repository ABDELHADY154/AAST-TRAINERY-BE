<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Student;
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
     *      path="/students",
     *      operationId="getAllStudents",
     *      tags={"Students"},
     *      summary="Get list of students",
     *      description="Returns list of students",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/SuccessOkVirtual")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *          @OA\JsonContent(ref="#/components/schemas/Response403Virtual")
     *      )
     *
     *     )
     */
    public function index()
    {
        $students = StudentResource::collection(Student::all());
        return $this->ok($students->resolve());
    }
    /**
     * @OA\GET(
     *      path="/W/student/get-profile",
     *      operationId="WgetStudentProfile",
     *      description=" Get Student General Info",
     *      summary="Get Student general information",
     *      tags={"W-Student Profile"},
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
     *      path="/W/studentImg",
     *      operationId="WgetStudentImage",
     *      description=" Get Student Image ",
     *      summary="Get Student Image ",
     *      tags={"W-Student Profile"},
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
