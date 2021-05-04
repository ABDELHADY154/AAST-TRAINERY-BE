<?php

namespace App\Http\Controllers\Api\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Coach;
use App\Http\Controllers\Controller;
use App\Http\Requests\SessionBookRequest;
use App\Http\Resources\CoachResource;
use App\Http\Resources\SessionResource;
use App\Session;
use App\Student;
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
     *      path="/A/sessions",
     *      operationId="Asessions",
     *      description="Get all sessions ",
     *      summary="Get all sessions",
     *      tags={"A-Career Coaching"},
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

    public function mGetAllSessions()
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

    /**
     * @OA\POST(
     *      path="/W/bookSession/{id}",
     *      summary="student book session",
     *      tags={"W-Career Coaching"},
     *      description="student book session",
     *      @OA\Parameter(
     *          name="id",
     *          description="session id",
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
     *          required=false,
     *          description="Student Book Session Date and time",
     *          @OA\JsonContent(ref="#/components/schemas/SessionBookRequest")
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

    public function bookSession(SessionBookRequest $request, $id)
    {
        $student = Student::where('id', auth('api')->id())->first();
        $session = Session::where('id', $id)->first();
        if ($session) {
            foreach ($student->sessions as $studentSession) {
                if ($studentSession->pivot->session_id == $session->id && $studentSession->pivot->student_id == $student->id) {
                    return $this->forbidden(['message' => 'Session is already Booked']);
                    break;
                }
            }
            $student->sessions()->attach($student->id, [
                'session_id' => $session->id,
                'booking_date' => $request->input('booking_date'),
            ]);
            $student->save();
            return $this->ok(['message' => 'student booked successfully']);
        } else {
            return $this->notFound(['session is not found']);
        }
    }

    /**
     * @OA\POST(
     *      path="/W/bookSession/cancelBooking/{id}",
     *      summary="student cancel session",
     *      tags={"W-Career Coaching"},
     *      description="student cancel session",
     *      @OA\Parameter(
     *          name="id",
     *          description="session id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
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
    public function unBookSession($id)
    {
        $student = Student::where('id', auth('api')->id())->first();
        $session = Session::where('id', $id)->first();
        if ($session) {
            $student->sessions()->detach($session->id);
            $student->save();
            return $this->ok(['message' => 'student canceled successfully']);
        } else {
            return $this->notFound(['session is not found']);
        }
    }

    /**
     * @OA\Get(
     *      path="/A/session/{id}",
     *      operationId="AgetSession",
     *      description="Get session ",
     *      summary="Get session",
     *      tags={"A-Career Coaching"},
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
    public function mGetSession($id)
    {
        $session = Session::find($id);
        if ($session) {
            return $this->ok((new SessionResource($session))->resolve());
        } else {
            return $this->notFound(['message' => 'Session Not Found']);
        }
    }

    /**
     * @OA\POST(
     *      path="/A/bookSession/{id}",
     *      summary="student book session",
     *      tags={"A-Career Coaching"},
     *      description="student book session",
     *      @OA\Parameter(
     *          name="id",
     *          description="session id",
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
     *          required=false,
     *          description="Student Book Session Date and time",
     *          @OA\JsonContent(ref="#/components/schemas/SessionBookRequest")
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

    public function mBookSession(SessionBookRequest $request, $id)
    {
        $student = Student::where('id', auth('api')->id())->first();
        $session = Session::where('id', $id)->first();
        if ($session) {
            foreach ($student->sessions as $studentSession) {
                if ($studentSession->pivot->session_id == $session->id && $studentSession->pivot->student_id == $student->id) {
                    return $this->forbidden(['message' => 'Session is already Booked']);
                    break;
                }
            }
            $student->sessions()->attach($student->id, [
                'session_id' => $session->id,
                'booking_date' => $request->input('booking_date'),
            ]);
            $student->save();
            return $this->ok(['message' => 'student booked successfully']);
        } else {
            return $this->notFound(['session is not found']);
        }
    }

    /**
     * @OA\POST(
     *      path="/A/bookSession/cancelBooking/{id}",
     *      summary="student cancel session",
     *      tags={"A-Career Coaching"},
     *      description="student cancel session",
     *      @OA\Parameter(
     *          name="id",
     *          description="session id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
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
    public function mUnBookSession($id)
    {
        $student = Student::where('id', auth('api')->id())->first();
        $session = Session::where('id', $id)->first();
        if ($session) {
            $student->sessions()->detach($session->id);
            $student->save();
            return $this->ok(['message' => 'student canceled successfully']);
        } else {
            return $this->notFound(['session is not found']);
        }
    }
}
