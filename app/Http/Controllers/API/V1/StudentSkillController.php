<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentSkillRequest;
use App\Http\Resources\StudentSkillResource;
use App\StudentSkill;
use Illuminate\Http\Request;

class StudentSkillController extends Controller
{
    use CoreJsonResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\GET(
     *      path="/W/student/profile/skill",
     *      operationId="getStudentAllSkills",
     *      description="Get Student All Skills",
     *      summary="Get Student Skills List",
     *      tags={"W-Student Skills"},

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
        $studentSkill = StudentSkillResource::collection(StudentSkill::where('student_id', auth('api')->id())->get());
        return $this->ok($studentSkill->resolve());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\POST(
     *      path="/W/student/profile/skill",
     *      description="Create Student Skill",
     *      summary="Create Student Skill",
     *      tags={"W-Student Skills"},
     *     security={
     *          {"passport": {}},
     *     },
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StudentSkillInfoRequest")
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
    public function store(StudentSkillRequest $request)
    {

        $studentSkill = StudentSkill::create([
            'skill_name' =>  $request->input('skill_name'),
            'years_of_exp' => $request->input('years_of_exp'),
            'student_id' => auth('api')->id(),
        ]);
        return $this->created((new StudentSkillResource($studentSkill))->resolve());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Get(
     *      path="/W/student/profile/skill/{id}",
     *      operationId="showStudentSkill",
     *      description="Get Student Skill",
     *      summary="Get Student Skill",
     *      tags={"W-Student Skills"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Skill id",
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
        $studentSkill = StudentSkill::find($id);
        if (!$studentSkill) {
            return  $this->notFound(['message' => 'Skill not found']);
        }
        if ($studentSkill->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        return $this->ok((new StudentSkillResource($studentSkill))->resolve());
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
     *      path="/W/student/profile/skill/{id}",
     *      summary="Update Student Skill",
     *      tags={"W-Student Skills"},
     *      description="Update Student Skill",
     *      @OA\Parameter(
     *          name="id",
     *          description="Skill id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
     * @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StudentSkillInfoRequest")
     *     ),
     *
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
    public function update(StudentSkillRequest $request, $id)
    {
        $studentSkill = StudentSkill::find($id);
        if (!$studentSkill) {
            return  $this->notFound(['message' => 'Skill not found']);
        }
        if ($studentSkill->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        $studentSkill->update([
            'skill_name' =>  $request->input('skill_name'),
            'years_of_exp' => $request->input('years_of_exp'),
            'student_id' => auth('api')->id(),
        ]);
        $studentSkill->save();
        return $this->created((new StudentSkillResource($studentSkill))->resolve());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Delete(
     *      path="/W/student/profile/skill/{id}",
     *      operationId="deleteStudentSkill",
     *      summary="Delete Student Skill ",
     *      tags={"W-Student Skills"},
     *      description="delete Student Skill ",
     *      @OA\Parameter(
     *          name="id",
     *          description="Skill id",
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
        $studentSkill = StudentSkill::find($id);
        if (!$studentSkill) {
            return  $this->notFound(['message' => 'Skill not found']);
        }
        if ($studentSkill->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        $studentSkill->destroy($id);
        return $this->ok(['message' => 'Deleted']);
    }
}
