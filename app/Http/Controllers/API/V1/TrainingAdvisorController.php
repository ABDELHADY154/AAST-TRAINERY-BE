<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\TrainingAdvisorProfileResource;
use App\TrainingAdvisor;
use Illuminate\Http\Request;

class TrainingAdvisorController extends Controller
{
    use CoreJsonResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="/W/student/advisor/{id}",
     *      operationId="showAdvisorProfile",
     *      description="Get Advisor Profile",
     *      summary="Get Advisor Profile",
     *      tags={"W-Get Profiles"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Advisor Id",
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
        $advisor = TrainingAdvisor::where('id', $id)->first();
        if (!$advisor) {
            return  $this->notFound(['message' => 'Advisor Not Found']);
        }
        return $this->ok((new TrainingAdvisorProfileResource($advisor))->resolve());
    }
    /**
     * @OA\Get(
     *      path="/A/student/advisor/{id}",
     *      operationId="showAdvisorProfile",
     *      description="Get Advisor Profile",
     *      summary="Get Advisor Profile",
     *      tags={"A-Get Profiles"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Advisor Id",
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
    public function mshow($id)
    {
        $advisor = TrainingAdvisor::where('id', $id)->first();
        if (!$advisor) {
            return  $this->notFound(['message' => 'Advisor Not Found']);
        }
        return $this->ok((new TrainingAdvisorProfileResource($advisor))->resolve());
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
