<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentAccountRequest;
use App\Http\Resources\StudentAccountResource;
use App\StudentAccount;
use Illuminate\Http\Request;

class StudentAccountController extends Controller
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
     *      path="/W/student/profile/account",
     *      operationId="getStudentAllAccounts",
     *      description="Get Student All Accounts",
     *      summary="Get Student Accounts Info",
     *      tags={"W-Student Accounts"},

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
        $studentAccount = StudentAccount::where('student_id', auth('api')->id())->get();
        if ($studentAccount) {
            $studentAccount =  StudentAccountResource::collection($studentAccount);
            return $this->ok($studentAccount->resolve());
        } else {
            return $this->ok(['data' => []]);
        }
    }

    /**
     * @OA\POST(
     *      path="/W/student/profile/account",
     *      summary="Update Student Account",
     *      tags={"W-Student Accounts"},
     *      description="Update Student Account",
     *     security={
     *          {"passport": {}},
     *     },
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StudentAccountRequest")
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
    public function store(StudentAccountRequest $request)
    {
        $profileScore = auth('api')->user()->profile_score + 0.125;
        $studentAccounts = StudentAccount::where('student_id', $this->student->id)->get();
        if (count($studentAccounts) == 0) {
            $this->student->update([
                'profile_score' => $profileScore
            ]);
        }
        $studentAccount = StudentAccount::where('student_id', auth('api')->id())->get();
        if (count($studentAccount) == 0) {
            $sudentAccount = StudentAccount::create([
                'website' =>  $request->input('website'),
                'facebook' => $request->input('facebook'),
                'instagram' => $request->input('instagram'),
                'youtube' => $request->input('youtube'),
                "linkedin" => $request->input('linkedin'),
                "behance" => $request->input('behance'),
                "github" => $request->input('github'),
                'student_id' => auth('api')->id(),
            ]);
            return $this->created((new StudentAccountResource($sudentAccount))->resolve());
        } else {
            $studentAccountUpdate = StudentAccount::find(auth('api')->user()->studentAccount->id);
            $studentAccountUpdate->update([
                'website' =>  $request->input('website'),
                'facebook' => $request->input('facebook'),
                'instagram' => $request->input('instagram'),
                'youtube' => $request->input('youtube'),
                "linkedin" => $request->input('linkedin'),
                "behance" => $request->input('behance'),
                "github" => $request->input('github'),
            ]);
            $studentAccountUpdate->save();
            return $this->created((new StudentAccountResource($studentAccountUpdate))->resolve());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
