<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;

class StudentSubscribeController extends Controller
{
    use CoreJsonResponse;
    /**
     * @OA\Get(
     *      path="/W/student/subscribe",
     *      operationId="WsubscribeStudent",
     *      description="student subscribe",
     *      summary="student subscribe",
     *      tags={"W-Account settings"},
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
     * @OA\Get(
     *      path="/A/student/subscribe",
     *      operationId="AsubscribeStudent",
     *      description="student subscribe",
     *      summary="student subscribe",
     *      tags={"A-Account settings"},
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
    public function subscribe()
    {
        $student = Student::where('id', auth('api')->id())->first();
        if ($student) {
            if ($student->subscribe == false) {
                $student->update([
                    'subscribe' => true,
                ]);
                $student->save();
                return $this->ok(['student subscribed successfully']);
            } else {
                return $this->forbidden(['student already subscribed']);
            }
        } else {
            return $this->notFound(['student not found']);
        }
    }
    /**
     * @OA\Get(
     *      path="/W/student/unsubscribe",
     *      operationId="WunSubscribeStudent",
     *      description="student unsubscribe",
     *      summary="student unsubscribe",
     *      tags={"W-Account settings"},
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
     * @OA\Get(
     *      path="/A/student/unsubscribe",
     *      operationId="AunSubscribeStudent",
     *      description="student unsubscribe",
     *      summary="student unsubscribe",
     *      tags={"A-Account settings"},
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
    public function unSubscribe()
    {
        $student = Student::where('id', auth('api')->id())->first();
        if ($student) {
            if ($student->subscribe == true) {
                $student->update([
                    'subscribe' => false,
                ]);
                $student->save();
                return $this->ok(['student unsubscribed successfully']);
            } else {
                return $this->forbidden(['student did not subscribe to unsubscribe']);
            }
        } else {
            return $this->notFound(['student not found']);
        }
    }
}
