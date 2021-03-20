<?php

namespace App\Http\Controllers\API\V1\Mobile;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentLanguageRequest;
use App\Http\Resources\StudentLanguageResource;
use App\StudentLanguage;
use Illuminate\Http\Request;

class StudentLanguageController extends Controller
{
    use CoreJsonResponse;
    public function __construct()
    {
        $this->student = auth('api')->user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\GET(
     *      path="/A/student/profile/language",
     *      operationId="getStudentAllLanguages",
     *      description="Get Student All Languages",
     *      summary="Get Student Languages List",
     *      tags={"A-Student Languages"},
     *     security={
     *          {"passport": {}},
     *     },
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
        $studentLanguages = StudentLanguageResource::collection(StudentLanguage::where('student_id', auth('api')->id())->get());
        return $this->ok($studentLanguages->resolve());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\POST(
     *      path="/A/student/profile/language",
     *      description="Create Student Language",
     *      summary="Create Student Language",
     *      tags={"A-Student Languages"},
     *     security={
     *          {"passport": {}},
     *     },
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StudentLanguageRequest")
     *     ),
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
    public function store(StudentLanguageRequest $request)
    {
        $profileScore = auth('api')->user()->profile_score + 0.125;
        $studentLanguages = StudentLanguage::where('student_id', $this->student->id)->get();
        if (count($studentLanguages) == 0) {
            $this->student->update([
                'profile_score' => $profileScore
            ]);
        }
        $studentLanguage = StudentLanguage::create([
            'language' => $request->input('language'),
            'level' => $request->input('level'),
            'student_id' => auth('api')->id()
        ]);
        return $this->created((new StudentLanguageResource($studentLanguage))->resolve());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="/A/student/profile/language/{id}",
     *      operationId="showStudentLanguage",
     *      description="Get Student Language Info",
     *      summary="Get Student Language",
     *      tags={"A-Student Languages"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Language id",
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
        $studentLanguage = StudentLanguage::find($id);
        if (!$studentLanguage) {
            return  $this->notFound(['message' => 'Language not found']);
        }
        if ($studentLanguage->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        return $this->ok((new StudentLanguageResource($studentLanguage))->resolve());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Put(
     *      path="/A/student/profile/language/{id}",
     *      summary="Update Student Language",
     *      tags={"A-Student Languages"},
     *      description="Update Student Language",
     *      @OA\Parameter(
     *          name="id",
     *          description="Language id",
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
     *              @OA\Schema(ref="#/components/schemas/StudentLanguageRequest")
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
    public function update(StudentLanguageRequest $request, $id)
    {
        $studentLanguage = StudentLanguage::find($id);
        if (!$studentLanguage) {
            return  $this->notFound(['message' => 'Language not found']);
        }
        if ($studentLanguage->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        $studentLanguage->update([

            'language' => $request->input('language'),
            'level' => $request->input('level'),
            'student_id' => auth('api')->id(),
        ]);
        $studentLanguage->save();
        return $this->created((new StudentLanguageResource($studentLanguage))->resolve());
    }
    /**
     * @OA\Delete(
     *      path="/A/student/profile/language/{id}",
     *      operationId="deleteStudentLanguage",
     *      summary="Delete Student Language ",
     *      tags={"A-Student Languages"},
     *      description="delete Student Language ",
     *      @OA\Parameter(
     *          name="id",
     *          description="Language id",
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
        $studentLanguage = StudentLanguage::find($id);
        if (!$studentLanguage) {
            return  $this->notFound(['message' => 'Language not found']);
        }
        if ($studentLanguage->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        $studentLanguage->destroy($id);
        return $this->ok(['message' => 'Deleted']);
    }
}
