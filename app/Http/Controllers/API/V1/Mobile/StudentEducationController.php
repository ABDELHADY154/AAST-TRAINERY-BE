<?php

namespace App\Http\Controllers\API\V1\Mobile;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentEducationRequest;
use App\Http\Resources\StudentEducationResource;
use App\StudentEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentEducationController extends Controller
{
    use CoreJsonResponse;
    public function __construct()
    {
        $this->student = auth('api')->user();
    }

    /**
     * @OA\GET(
     *      path="/A/student/profile/education",
     *      operationId="AgetStudentEducationInfo",
     *      description="Get Student education Info",
     *      summary="Get Student education information",
     *      tags={"A-Student Education Info"},

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

        $eduResource = StudentEducationResource::collection(StudentEducation::where('student_id', auth('api')->id())->get());
        return $this->ok($eduResource->resolve());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\POST(
     *      path="/A/student/profile/education",
     *      description="Create Student Education Info",
     *      summary="Create Student Education Info",
     *      tags={"A-Student Education Info"},
     *     security={
     *          {"passport": {}},
     *     },
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *          mediaType="multipart/form-data",
     *          @OA\Schema(ref="#/components/schemas/StudentEducationInfoRequest")
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
    public function store(StudentEducationRequest $request)
    {
        $profileScore = auth('api')->user()->profile_score + 0.125;
        $studentEducations = StudentEducation::where('student_id', $this->student->id)->get();
        if (count($studentEducations) == 0) {
            $this->student->update([
                'profile_score' => $profileScore
            ]);
        }
        if ($request->file('cred')) {
            $fileName = $request->file('cred')->hashName();
            $path = $request->file('cred')->storeAs(
                'public/files/student/educations',
                $fileName
            );
            $studentEdu = StudentEducation::create([
                'school_name' => $request->input('school_name'),
                'cred' => $fileName,
                'cred_url' => $request->input('cred_url'),
                'country' => $request->input('country'),
                'city' => $request->input('city'),
                'from' => $request->input('from'),
                'to' => $request->input('to'),
                'student_id' => auth('api')->id(),
            ]);
            return $this->created((new StudentEducationResource($studentEdu))->resolve());
        }

        $studentEdu = StudentEducation::create([
            'school_name' => $request->input('school_name'),
            'cred' => $request->input('cred'),
            'cred_url' => $request->input('cred_url'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'student_id' => auth('api')->id(),
        ]);
        return $this->created((new StudentEducationResource($studentEdu))->resolve());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Get(
     *      path="/A/student/profile/education/{id}",
     *      operationId="AgetStudentEducation",
     *      summary="Get Student Education Info",
     *      tags={"A-Student Education Info"},
     *      description="Get Student Education Info",
     *      @OA\Parameter(
     *          name="id",
     *          description="Education id",
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
        $studentEducation = StudentEducation::find($id);
        if (!$studentEducation) {
            return  $this->notFound(['message' => 'education not found']);
        }
        if ($studentEducation->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        return $this->ok((new StudentEducationResource($studentEducation))->resolve());
    }
    /**
     * @OA\POST(
     *      path="/A/student/profile/education/{id}",
     *      summary="Update Student Education Info",
     *      tags={"A-Student Education Info"},
     *      description="Update Student Education Info",
     *      @OA\Parameter(
     *          name="id",
     *          description="Education id",
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
     *              @OA\Schema(ref="#/components/schemas/StudentEducationInfoRequest")
     *   )
     *     ),
     *
     *     @OA\Response(
     *          response="200",
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


    public function update(StudentEducationRequest $request, $id)
    {

        $studentEdu = StudentEducation::find($id);
        if (!$studentEdu) {
            return  $this->notFound(['message' => 'education not found']);
        }
        if ($studentEdu->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        if ($request->file('cred')) {
            $fileName = $request->file('cred')->hashName();
            $path = $request->file('cred')->storeAs(
                'public/files/student/educations',
                $fileName
            );

            $studentEdu->update([
                'school_name' => $request->input('school_name'),
                'cred' => $fileName,
                'cred_url' => $request->input('cred_url'),
                'country' => $request->input('country'),
                'city' => $request->input('city'),
                'from' => $request->input('from'),
                'to' => $request->input('to'),
                'student_id' => auth('api')->id(),
            ]);
            $studentEdu->save();

            return $this->created((new StudentEducationResource($studentEdu))->resolve());
        }
        $studentEdu->update([
            'school_name' => $request->input('school_name'),
            'cred_url' => $request->input('cred_url'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'student_id' => auth('api')->id(),
        ]);
        $studentEdu->save();
        return $this->created((new StudentEducationResource($studentEdu))->resolve());
    }
    /**
     * @OA\Delete(
     *      path="/A/student/profile/education/{id}",
     *      operationId="AdeleteStudentEducation",
     *      summary="Delete Student Education Info",
     *      tags={"A-Student Education Info"},
     *      description="delete Student Education Info",
     *      @OA\Parameter(
     *          name="id",
     *          description="Education id",
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentEdu = StudentEducation::find($id);

        if (!$studentEdu) {
            return  $this->notFound(['message' => 'education not found']);
        }
        if ($studentEdu->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        if ($studentEdu->cred !== null) {
            Storage::delete(
                'public/files/student/educations/' .
                    $studentEdu->cred
            );
        }
        $studentEdu->destroy($id);
        return $this->ok(['message' => 'Deleted']);
    }
}
