<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentGeneralInfoRequest;
use App\Http\Resources\StudentGeneralInfoResource;
use App\Http\Resources\StudentResource;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    use CoreJsonResponse;
    public function __construct()
    {
        $this->student = auth('api')->user();
    }

    /**
     * @OA\POST(
     *      path="/W/student/profile/general",
     *      description="Update Student General Info",
     *      summary="Update Student General Info",
     *      tags={"W-Student General Info"},
     *     security={
     *          {"passport": {}},
     *     },
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *          mediaType="multipart/form-data",
     *              @OA\Schema(ref="#/components/schemas/StudentGeneralInfoRequest")
     *   )
     *     ),
     *
     *     @OA\Response(
     *          response="201",
     *          description="Student Data to success",
     *          @OA\JsonContent(ref="#/components/schemas/SuccessAcceptedVirtual")
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
    public function generalInfo(StudentGeneralInfoRequest $request)
    {
        if ($request->file('image')) {

            $imageName = $request->file('image')->hashName();
            $path = $request->file('image')->storeAs(
                'public/images/avatars',
                $imageName
            );
            $student = $this->student->update([
                'phone_number' => $request->input('phone_number'),
                'university' => $request->input('university'),
                'city' => $request->input('city'),
                'country' => $request->input('country'),
                'nationality' => $request->input('nationality'),
                'date_of_birth' => $request->input('date_of_birth'),
                'gender' => $request->input('gender'),
                'start_year' => $request->input('start_year'),
                'end_year' => $request->input('end_year'),
                'gpa' => $request->input('gpa'),
                'period' => $request->input('period'),
                'reg_no' => $request->input('reg_no'),
                'name' => $request->input('name'),
                'department_id' => $request->input('department_id'),
                'image' => $imageName
            ]);
        }
        // dd($request->all());
        $student = $this->student->update([
            'phone_number' => $request->input('phone_number'),
            'university' => $request->input('university'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'nationality' => $request->input('nationality'),
            'date_of_birth' => $request->input('date_of_birth'),
            'gender' => $request->input('gender'),
            'start_year' => $request->input('start_year'),
            'end_year' => $request->input('end_year'),
            'gpa' => $request->input('gpa'),
            'period' => $request->input('period'),
            'reg_no' => $request->input('reg_no'),
            'name' => $request->input('name'),
            'department_id' => $request->input('department_id'),
            // 'image' => $imageName
        ]);
        $this->student->save();
        return $this->created((new StudentGeneralInfoResource(auth('api')->user()))->resolve());
    }

    /**
     * @OA\GET(
     *      path="/W/student/profile/general",
     *      operationId="getStudentGeneralInfo",
     *      description="Get Student General Info",
     *      summary="Get Student general information",
     *      tags={"W-Student General Info"},
     *     security={
     *          {"passport": {}},
     *     },
     *     @OA\Response(
     *          response="200",
     *          description="Student Data to success",
     *           @OA\JsonContent(ref="#/components/schemas/SuccessOkVirtual")
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
    public function getGeneralInfo()
    {
        $student = $this->student;
        return $this->ok((new StudentGeneralInfoResource($student))->resolve());
    }
}
