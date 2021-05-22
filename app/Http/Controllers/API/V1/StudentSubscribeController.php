<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    /**
     * @OA\POST(
     *      path="/W/student/updatePassword",
     *      description="Update Student Password",
     *      summary="Update Student Password",
     *      tags={"W-Account settings"},
     *     security={
     *          {"passport": {}},
     *     },
     *     @OA\RequestBody(
     *          required=true,
     *          description="Student Old and new password",
     *          @OA\JsonContent(ref="#/components/schemas/StudentAcountSettingsPassword")
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
     * @OA\PUT(
     *      path="/A/student/updatePassword",
     *      description="Update Student Password",
     *      summary="Update Student Password",
     *      tags={"A-Account settings"},
     *     security={
     *          {"passport": {}},
     *     },
     *     @OA\RequestBody(
     *          required=true,
     *          description="Student Old and new password",
     *          @OA\JsonContent(ref="#/components/schemas/StudentAcountSettingsPassword")
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
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => [
                'required', 'min:6',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.]).{2,}$/'
            ],
            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.]).{2,}$/',
                'confirmed'
            ],
        ]);

        $student = Student::find(auth('api')->id());
        if (Hash::check($request->input('old_password'), $student->password)) {
            $student->password = Hash::make($request->input('password'));
            $student->save();
            return $this->created(['message' => 'Password updated successfully']);
            // dd($request->all());
        } else {
            return $this->forbidden(['Old password is incorrect']);
        }
    }

    /**
     * @OA\POST(
     *      path="/W/student/updateEmail",
     *      description="Update Student Email",
     *      summary="Update Student Email",
     *      tags={"W-Account settings"},
     *     security={
     *          {"passport": {}},
     *     },
     *     @OA\RequestBody(
     *          required=true,
     *          description="Student Old and new password",
     *          @OA\JsonContent(ref="#/components/schemas/StudentAcountSettingsEmail")
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
     * @OA\PUT(
     *      path="/A/student/updateEmail",
     *      description="Update Student Email",
     *      summary="Update Student Email",
     *      tags={"A-Account settings"},
     *     security={
     *          {"passport": {}},
     *     },
     *     @OA\RequestBody(
     *          required=true,
     *          description="Student Old and new password",
     *          @OA\JsonContent(ref="#/components/schemas/StudentAcountSettingsEmail")
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
    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'regex:/(.*)@student.aast\.edu/i', 'unique:students,email,' . auth('api')->id()], //regex:/(.*)@myemail\.com/i'unique:students,email'
        ]);
        $student = Student::find(auth('api')->id());
        if ($student) {
            $student->email = $request->input('email');
            $student->save();
            return $this->created(['message' => 'email updated successfully']);
        }
    }
    /**
     * @OA\Get(
     *      path="/A/student/studentAccount",
     *      operationId="AstudentAccountStudent",
     *      description="student studentAccount",
     *      summary="student studentAccount",
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
     */ /**
     * @OA\Get(
     *      path="/W/student/studentAccount",
     *      operationId="AstudentAccountStudent",
     *      description="student studentAccount",
     *      summary="student studentAccount",
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
    public function getStudentData()
    {
        $student = Student::find(auth('api')->id());

        if ($student) {
            return  $this->ok([
                'email' => $student->email,
                'subscribed' => $student->subscribe == 0 ? false : true,
            ]);
        }
    }
    /**
     * @OA\POST(
     *      path="/W/student/deleteAccount",
     *      description="delete student account",
     *      summary="delete student account",
     *      tags={"W-Account settings"},
     *     security={
     *          {"passport": {}},
     *     },
     *     @OA\RequestBody(
     *          required=true,
     *          description="Student Old and new password",
     *          @OA\JsonContent(ref="#/components/schemas/StudentAcountSettingsDeleteAcc")
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
     * @OA\POST(
     *      path="/A/student/deleteAccount",
     *      description="delete student account",
     *      summary="delete student account",
     *      tags={"A-Account settings"},
     *     security={
     *          {"passport": {}},
     *     },
     *     @OA\RequestBody(
     *          required=true,
     *          description="Student Old and new password",
     *          @OA\JsonContent(ref="#/components/schemas/StudentAcountSettingsDeleteAcc")
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
    public function deleteAccount(Request $request)
    {
        $request->validate([

            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.]).{2,}$/',
                'confirmed'
            ],
        ]);
        $student = Student::find(auth('api')->id());
        if (Hash::check($request->input('password'), $student->password)) {
            $student->delete();
            return $this->created(['message' => 'Account Deleted Successfully']);
            // dd($request->all());
        } else {
            return $this->forbidden(['password is incorrect']);
        }
    }
}
