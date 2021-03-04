<?php

namespace App\Http\Controllers\API\V1\Mobile;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentCourseRequest;
use App\Http\Resources\StudentCourseResource;
use App\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentCourseController extends Controller
{
    use CoreJsonResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\GET(
     *      path="/A/student/profile/course",
     *      operationId="getStudentAllCourses",
     *      description="Get Student All Courses",
     *      summary="Get Student Courses Info",
     *      tags={"A-Student Courses"},

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
    public function index()
    {
        $studentCourses = StudentCourseResource::collection(StudentCourse::where('student_id', auth('api')->id())->get());
        return $this->ok($studentCourses->resolve());
    }

    /**
     * @OA\POST(
     *      path="/A/student/profile/course",
     *      description="Create Student Course Info",
     *      summary="Create Student Course",
     *      tags={"A-Student Courses"},
     *     security={
     *          {"passport": {}},
     *     },
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *          mediaType="multipart/form-data",
     *          @OA\Schema(ref="#/components/schemas/StudentCourseInfoRequest")
     *   )
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentCourseRequest $request)
    {
        if ($request->file('cred')) {
            $fileName = $request->file('cred')->hashName();
            $path = $request->file('cred')->storeAs(
                'public/files/student/course',
                $fileName
            );
            $studentCourse = StudentCourse::create([

                'cred' => $fileName,
                'cred_url' => $request->input('cred_url'),
                'from' => $request->input('from'),
                'to' => $request->input('to'),
                "course_name" => $request->input('course_name'),
                "course_provider" => $request->input('course_provider'),
                'student_id' => auth('api')->id(),
            ]);
            return $this->created((new StudentCourseResource($studentCourse))->resolve());
        }

        $studentCourse = StudentCourse::create([
            'cred' =>  $request->input('cred'),
            'cred_url' => $request->input('cred_url'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            "course_name" => $request->input('course_name'),
            "course_provider" => $request->input('course_provider'),
            'student_id' => auth('api')->id(),
        ]);
        return $this->created((new StudentCourseResource($studentCourse))->resolve());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="/A/student/profile/course/{id}",
     *      operationId="showStudentCourseInfo",
     *      description="Get Student Course Info",
     *      summary="Get Student Course",
     *      tags={"A-Student Courses"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Course id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
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
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/Response404Virtual")
     *      )
     * )
     */
    public function show($id)
    {
        $studentCourse = StudentCourse::find($id);
        if (!$studentCourse) {
            return  $this->notFound(['message' => 'education not found']);
        }
        if ($studentCourse->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        return $this->ok((new StudentCourseResource($studentCourse))->resolve());
    }
    /**
     * @OA\POST(
     *      path="/A/student/profile/course/{id}",
     *      summary="Update Student Course",
     *      tags={"A-Student Courses"},
     *      description="Update Student Course",
     *      @OA\Parameter(
     *          name="id",
     *          description="Course id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *          mediaType="multipart/form-data",
     *              @OA\Schema(ref="#/components/schemas/StudentCourseInfoRequest")
     *   )
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
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentCourseRequest $request, $id)
    {
        $studentCourse = StudentCourse::find($id);
        if (!$studentCourse) {
            return  $this->notFound(['message' => 'education not found']);
        }
        if ($studentCourse->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        if ($request->file('cred')) {
            $fileName = $request->file('cred')->hashName();
            $path = $request->file('cred')->storeAs(
                'public/files/student/course',
                $fileName
            );

            $studentCourse->update([
                'cred' => $fileName,
                'cred_url' => $request->input('cred_url'),
                'from' => $request->input('from'),
                'to' => $request->input('to'),
                "course_name" => $request->input('course_name'),
                "course_provider" => $request->input('course_provider'),
                'student_id' => auth('api')->id(),
            ]);
            $studentCourse->save();

            return $this->created((new StudentCourseResource($studentCourse))->resolve());
        }
        $studentCourse->update([

            'cred_url' => $request->input('cred_url'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            "course_name" => $request->input('course_name'),
            "course_provider" => $request->input('course_provider'),
            'student_id' => auth('api')->id(),
        ]);
        $studentCourse->save();
        return $this->created((new StudentCourseResource($studentCourse))->resolve());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Delete(
     *      path="/A/student/profile/course/{id}",
     *      operationId="deleteStudentCourse",
     *      summary="Delete Student Course ",
     *      tags={"A-Student Courses"},
     *      description="delete Student Course ",
     *      @OA\Parameter(
     *          name="id",
     *          description="Course id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
     *      @OA\Response(
     *          response=204,
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
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/Response404Virtual")
     *      )
     * )
     */
    public function destroy($id)
    {
        $studentCourse = StudentCourse::find($id);
        if (!$studentCourse) {
            return  $this->notFound(['message' => 'education not found']);
        }
        if ($studentCourse->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        if ($studentCourse->cred !== null) {
            Storage::delete(
                'public/files/student/course/' .
                    $studentCourse->cred
            );
        }
        $studentCourse->destroy($id);
        return $this->ok(['message' => 'Deleted']);
    }
}
