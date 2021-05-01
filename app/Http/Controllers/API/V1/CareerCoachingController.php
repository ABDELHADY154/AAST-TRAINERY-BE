<?php

namespace App\Http\Controllers\Api\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Coach;
use App\Http\Controllers\Controller;
use App\Http\Resources\CoachResource;
use App\Http\Resources\SessionResource;
use App\Session;
use Illuminate\Http\Request;

class CareerCoachingController extends Controller
{
    use CoreJsonResponse;



    /**
     * @OA\Get(
     *      path="/W/coaches",
     *      operationId="Coaches",
     *      description="Get all Coaches ",
     *      summary="Get all Coaches",
     *      tags={"W-Career Coaching"},
     *      security={
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
    public function getAllCoaches()
    {
        $coaches = Coach::all();
        return $this->ok(CoachResource::collection($coaches)->resolve());
    }
    /**
     * @OA\Get(
     *      path="/W/sessions",
     *      operationId="sessions",
     *      description="Get all sessions ",
     *      summary="Get all sessions",
     *      tags={"W-Career Coaching"},
     *      security={
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


    public function getAllSessions()
    {
        $sessions = Session::all();
        return $this->ok(SessionResource::collection($sessions)->resolve());
    }
    /**
     * @OA\Get(
     *      path="/W/session/{id}",
     *      operationId="getSession",
     *      description="Get session ",
     *      summary="Get session",
     *      tags={"W-Career Coaching"},
     *      security={
     *          {"passport": {}},
     *     },
     *      @OA\Parameter(
     *          name="id",
     *          description="session ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
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
    public function getSession($id)
    {
        $session = Session::find($id);
        if ($session) {
            return $this->ok((new SessionResource($session))->resolve());
        } else {
            return $this->notFound(['message' => 'Session Not Found']);
        }
    }
}
