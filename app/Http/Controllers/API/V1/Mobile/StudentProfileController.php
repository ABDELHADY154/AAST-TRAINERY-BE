<?php

namespace App\Http\Controllers\API\V1\Mobile;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mobile\StudentAcademicInfoRequest;
use App\Http\Requests\Mobile\StudentPersonalInfoRequest;
use App\Http\Resources\Mobile\StudentAcademicInfoResource;
use App\Http\Resources\Mobile\StudentPersonalInfoResource;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    use CoreJsonResponse;
    public function __construct()
    {
        $this->student = auth('api')->user();
    }

    /**
     * @OA\Put(
     *      path="/A/student/profile/personal",
     *      description="Update Student Personal Info",
     *      summary="Update Student Personal Info",
     *      tags={"A-Student Personal Info"},
     *     security={
     *          {"passport": {}},
     *     },
     *         @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StudentPersonalInfoRequest")
     *     ),
     *
     *     @OA\Response(
     *          response="201",
     *          description="Student Data to success",
     *           @OA\JsonContent(ref="#/components/schemas/SuccessAcceptedVirtual")
     *      ),
     *
     *     @OA\Response(
     *          response="422",
     *          description="Validation Error",
     *           @OA\JsonContent(ref="#/components/schemas/Response422Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *           @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *     )
     * )
     */
    public function personalInfo(StudentPersonalInfoRequest $request)
    {

        $this->student->update($request->all());
        $this->student->save();
        return $this->created((new StudentPersonalInfoResource($this->student))->resolve());
    }
    /**
     * @OA\Put(
     *      path="/A/student/profile/academic",
     *      description="Update Student Academic Info",
     *      summary="Update Student Academic Info",
     *      tags={"A-Student Academic Info"},
     *     security={
     *          {"passport": {}},
     *     },
     *         @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StudentAcademicInfoRequest")
     *     ),
     *
     *     @OA\Response(
     *          response="201",
     *          description="Student Data to success",
     *           @OA\JsonContent(ref="#/components/schemas/SuccessAcceptedVirtual")
     *      ),
     *
     *     @OA\Response(
     *          response="422",
     *          description="Validation Error",
     *           @OA\JsonContent(ref="#/components/schemas/Response422Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *           @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *     )
     * )
     */
    public function academicInfo(StudentAcademicInfoRequest $request)
    {
        $this->student->update($request->all());
        $this->student->save();
        return $this->created((new StudentAcademicInfoResource($this->student))->resolve());
    }

    /**
     * @OA\GET(
     *      path="/A/student/profile/personal",
     *      operationId="getStudentPersonalInfo",
     *      description="Get Student Personal Info",
     *      summary="Get Student Personal information",
     *      tags={"A-Student Personal Info"},

     *     security={
     *          {"passport": {}},
     *     },
     *
     *     @OA\Response(
     *          response="200",
     *          description="Student Data to success",
     *          @OA\JsonContent(ref="#/components/schemas/SuccessOkVirtual")
     *      ),
     *
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
    public function getPersonalInfo()
    {
        return $this->created((new StudentPersonalInfoResource($this->student))->resolve());
    }
    /**
     * @OA\GET(
     *      path="/A/student/profile/academic",
     *      operationId="getStudentAcademicInfo",
     *      description="Get Student Academic Info",
     *      summary="Get Student Academic information",
     *      tags={"A-Student Academic Info"},

     *     security={
     *          {"passport": {}},
     *     },
     *
     *     @OA\Response(
     *          response="200",
     *          description="Student Data to success",
     *          @OA\JsonContent(ref="#/components/schemas/SuccessOkVirtual")
     *      ),
     *
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
    public function getAcademicInfo()
    {
        return $this->created((new StudentAcademicInfoResource($this->student))->resolve());
    }
}
