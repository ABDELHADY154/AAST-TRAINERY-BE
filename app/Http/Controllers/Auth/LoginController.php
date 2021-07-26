<?php

namespace App\Http\Controllers\Auth;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentLoginRequest;
use App\Http\Resources\AuthResource;
use App\Providers\RouteServiceProvider;
use App\Student;
// use App\student;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    use CoreJsonResponse;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * @OA\Post(
     *     path="/login",
     *     description="Student Login Endpoint",
     *     tags={"Authentication"},
     *
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StudentLoginRequest")
     *     ),
     *
     *
     *     @OA\Response(
     *          response="200",
     *          description="Student login success message and data",
     *          @OA\JsonContent(ref="#/components/schemas/SuccessOkVirtual")
     *     ),
     *
     *     @OA\Response(
     *          response="422",
     *          description="Unprocessable Entity/Validation Error",
     *               @OA\JsonContent(ref="#/components/schemas/Response422Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="401",
     *          description="Bad Request/Incorrect Username or Password",
     *          @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *      )
     * )
     */


    public function studentLogin(StudentLoginRequest $request)
    {
        $student = Student::where('email', $request->email)->first();

        if (!$student || !Hash::check($request->password, $student->password) || ($student == null)) {
            throw ValidationException::withMessages([
                'email' => ['Incorrect Email or Password'],
            ]);
        }
        $token = $student->createToken('Auth Token')->accessToken;
        return $this->ok((new AuthResource([$student, $token]))->resolve());
    }
}
