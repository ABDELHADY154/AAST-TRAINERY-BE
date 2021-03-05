<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentInterestRequest;
use App\Http\Resources\StudentInterestResource;
use App\StudentInterest;
use Illuminate\Http\Request;

class StudentInterestController extends Controller
{
    use CoreJsonResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\GET(
     *      path="/W/student/profile/interest",
     *      operationId="getStudentAllInterests",
     *      description="Get Student All Interests",
     *      summary="Get Student Interests List",
     *      tags={"W-Student Interests"},

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
        $studentSkill = StudentInterestResource::collection(StudentInterest::where('student_id', auth('api')->id())->get());
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
     *      path="/W/student/profile/interest",
     *      description="Create Student Interest",
     *      summary="Create Student Interest",
     *      tags={"W-Student Interests"},
     *     security={
     *          {"passport": {}},
     *     },
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StudentInterestListRequest")
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
    public function store(StudentInterestRequest $request)
    {
        $InterestsArr = $request->all();
        $studentInterestsArr = [];
        foreach ($InterestsArr["interests"] as $key => $interest) {
            if (isset($interest["interest"])) {
                $studentInterest = StudentInterest::create([
                    'interest' =>  $interest["interest"],
                    'student_id' => auth('api')->id(),
                ]);
                $studentInterestsArr[] = $studentInterest;
            } else {

                return $this->invalidRequest(['message' => 'interest is required']);
                break;
            }
        }

        return $this->created(StudentInterestResource::collection($studentInterestsArr)->resolve());
    }


    /**
     * @OA\Get(
     *      path="/W/student/profile/interest/{id}",
     *      operationId="showInterestInfo",
     *      description="Get Student Interest",
     *      summary="Get Student Interest",
     *      tags={"W-Student Interests"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Interest id",
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
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentInterest = StudentInterest::find($id);
        if (!$studentInterest) {
            return  $this->notFound(['message' => 'Skill not found']);
        }
        if ($studentInterest->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        return $this->ok((new StudentInterestResource($studentInterest))->resolve());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Delete(
     *      path="/W/student/profile/interest/{id}",
     *      operationId="deleteStudentInterest",
     *      summary="Delete Student Interest ",
     *      tags={"W-Student Interests"},
     *      description="delete Student Interest ",
     *      @OA\Parameter(
     *          name="id",
     *          description="Interest id",
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
        $studentInterest = StudentInterest::find($id);
        if (!$studentInterest) {
            return  $this->notFound(['message' => 'Skill not found']);
        }
        if ($studentInterest->student_id !== auth('api')->id()) {
            return $this->unauthorized();
        }
        $studentInterest->destroy($id);
        return $this->ok(['message' => 'Deleted']);
    }
}
