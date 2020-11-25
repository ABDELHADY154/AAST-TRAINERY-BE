<?php

namespace App\Http\Controllers\Auth;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
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

    public function studentLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);
        $student = Student::where('email', $request->email)->first();


        if (!$student || !Hash::check($request->password, $student->password) || ($student->email != $request->email)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid email or password'],
            ]);
        }
        // $student->getToke
        // return $student->createToken('Auth Token')->accessToken;
        $token = $student->createToken('Auth Token')->accessToken;
        return $this->created((new AuthResource([$student, $token]))->resolve());
    }
}
