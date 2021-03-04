<?php

namespace App\Http\Controllers\API\V1\Mobile;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentWorkExperienceRequest;
use App\Http\Resources\Mobile\StudentWorkExperienceResource;
use App\StudentWorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentWorkExperienceController extends Controller
{
    use CoreJsonResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\GET(
     *      path="/A/student/profile/experience",
     *      operationId="getStudentExperienceInfo",
     *      description="Get Student Experience Info",
     *      summary="Get Student Experience information",
     *      tags={"A-Student Experience Info"},

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
        $workExp = StudentWorkExperienceResource::collection(StudentWorkExperience::where('student_id', auth('api')->id())->get());
        return $this->ok($workExp->resolve());
    }


    /**
     * @OA\POST(
     *      path="/A/student/profile/experience",
     *      description="Create Student Experience",
     *      summary="Create Student Experience",
     *      tags={"A-Student Experience Info"},
     *     security={
     *          {"passport": {}},
     *     },
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *          mediaType="multipart/form-data",
     *          @OA\Schema(ref="#/components/schemas/StudentWorkExperienceInfoRequest")
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
    public function store(StudentWorkExperienceRequest $request)
    {
        if ($request->file('cred')) {
            $fileName = $request->file('cred')->hashName();
            $path = $request->file('cred')->storeAs(
                'public/files/student/experience',
                $fileName
            );
            $studentExp = StudentWorkExperience::create([
                'experience_type' => $request->input('experience_type'),
                'cred' => $fileName,
                'cred_url' => $request->input('cred_url'),
                'country' => $request->input('country'),
                "currently_work" => $request->input('currently_work'),
                'city' => $request->input('city'),
                'from' => $request->input('from'),
                'to' => $request->input('to'),
                "job_title" => $request->input('job_title'),
                "company_name" => $request->input('company_name'),
                'student_id' => auth('api')->id(),
            ]);
            return $this->created((new StudentWorkExperienceResource($studentExp))->resolve());
        }

        $studentExp = StudentWorkExperience::create([
            'experience_type' => $request->input('experience_type'),
            'cred' =>  $request->input('cred'),
            'cred_url' => $request->input('cred_url'),
            'country' => $request->input('country'),
            "currently_work" => $request->input('currently_work'),
            'city' => $request->input('city'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            "job_title" => $request->input('job_title'),
            "company_name" => $request->input('company_name'),
            'student_id' => auth('api')->id(),
        ]);
        return $this->created((new StudentWorkExperienceResource($studentExp))->resolve());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="/A/student/profile/experience/{id}",
     *      operationId="showStudentExperience",
     *      summary="Show Student Experience ",
     *      tags={"A-Student Experience Info"},
     *      description="Get Student Experience Info",
     *      @OA\Parameter(
     *          name="id",
     *          description="Experience id",
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
        $studentExp = StudentWorkExperience::find($id);
        if (!$studentExp) {
            return  $this->notFound(['message' => 'education not found']);
        }
        if ($studentExp->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        return $this->ok((new StudentWorkExperienceResource($studentExp))->resolve());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\POST(
     *      path="/A/student/profile/experience/{id}",
     *      summary="Update Student Experience",
     *      tags={"A-Student Experience Info"},
     *      description="Update Student Experience",
     *      @OA\Parameter(
     *          name="id",
     *          description="Experience id",
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
     *              @OA\Schema(ref="#/components/schemas/StudentWorkExperienceInfoRequest")
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
    public function update(StudentWorkExperienceRequest $request, $id)
    {
        $studentExp = StudentWorkExperience::find($id);
        if (!$studentExp) {
            return  $this->notFound(['message' => 'education not found']);
        }
        if ($studentExp->student_id !== auth('api')->id()) {

            return $this->unauthorized();
        }
        if ($request->file('cred')) {
            $fileName = $request->file('cred')->hashName();
            $path = $request->file('cred')->storeAs(
                'public/files/student/experience',
                $fileName
            );

            $studentExp->update([
                'experience_type' => $request->input('experience_type'),
                'cred' => $fileName,
                'cred_url' => $request->input('cred_url'),
                'country' => $request->input('country'),
                "currently_work" => $request->input('currently_work'),
                'city' => $request->input('city'),
                'from' => $request->input('from'),
                'to' => $request->input('to'),
                "job_title" => $request->input('job_title'),
                "company_name" => $request->input('company_name'),
                'student_id' => auth('api')->id(),
            ]);
            $studentExp->save();
            return $this->created((new StudentWorkExperienceResource($studentExp))->resolve());
        }
        $studentExp->update([
            'experience_type' => $request->input('experience_type'),
            'cred_url' => $request->input('cred_url'),
            'country' => $request->input('country'),
            "currently_work" => $request->input('currently_work'),
            'city' => $request->input('city'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            "job_title" => $request->input('job_title'),
            "company_name" => $request->input('company_name'),
            'student_id' => auth('api')->id(),
        ]);
        $studentExp->save();
        return $this->created((new StudentWorkExperienceResource($studentExp))->resolve());
    }
    /**
     * @OA\Delete(
     *      path="/A/student/profile/experience/{id}",
     *      operationId="deleteStudentExperience",
     *      summary="Delete Student Experience ",
     *      tags={"A-Student Experience Info"},
     *      description="delete Student Experience ",
     *      @OA\Parameter(
     *          name="id",
     *          description="Experience id",
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
        $studentExp = StudentWorkExperience::find($id);
        if (!$studentExp) {
            return  $this->notFound(['message' => 'education not found']);
        }
        if ($studentExp->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        if ($studentExp->cred !== null) {
            Storage::delete(
                'public/files/student/experience/' .
                    $studentExp->cred
            );
        }
        $studentExp->destroy($id);
        return $this->ok(['message' => 'Deleted']);
    }
}
