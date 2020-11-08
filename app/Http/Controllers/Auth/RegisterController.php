<?php

namespace App\Http\Controllers\Auth;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Providers\RouteServiceProvider;
use App\Student;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use CoreJsonResponse;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function studentRegister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:students,email'],
            'password' => ['required'],
            'start_year' => ['required', 'integer'],
            'end_year' => ['required', 'integer'],
            // 'gpa' => ['required', 'max:4', 'regex:/^\d*(\.\d{2})?$/'],
            // 'period' => ['required', 'integer', 'max:10'],
            'reg_no' => ['required', 'integer'],
            // 'college_id' => ['required', 'exists:colleges,id'],
        ]);

        $student =  Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'start_year' => $request->start_year,
            'end_year' => $request->end_year,
            // 'gpa' => $request->gpa,
            // 'period' => $request->period,
            // 'college_id' => $request->college_id,
            'reg_no' => $request->reg_no,
            'image' => 'default.png'
        ]);
        return $this->created();
        // return $this->created((new StudentResource($student))->resolve());
    }
}
