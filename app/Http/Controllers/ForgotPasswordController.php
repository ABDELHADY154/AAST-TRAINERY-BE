<?php

namespace App\Http\Controllers;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Requests\ForgotPasswordRequest;
use App\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    use CoreJsonResponse;
    public function forgot(ForgotPasswordRequest $request)
    {
        $email  = $request->input('email');
        if (Student::where('email', $email)->doesntExist()) {
            return $this->notFound(['message' => 'email do not exist']);
        }
        $token = Str::random(20);
        DB::table('forget_password_resets')->insert([
            'email' => $email,
            'token' => $token
        ]);
        Mail::send('Email.ForgetPassword', ['token' => $token], function (Message $message) use ($email) {
            $message->to($email);
            $message->subject('reset your password');
        });
        return $this->created(['message' => 'reset password email sent successfully']);
    }

    public function resetForm($token)
    {
        return view('Email.Form', ['token' => $token]);
    }
    public function reset(Request $request, $token)
    {
        $request->validate([
            'password' => ['required', 'min:6', 'confirmed'],
        ]);
        if (!$passwordResets = DB::table('forget_password_resets')->where('token', $token)->first()) {
            return $this->badRequest(['message' => 'invalid token']);
        }
        if (!$student = Student::where('email', $passwordResets->email)->first()) {
            return $this->notFound(['message' => 'not found user ']);
        }
        $student->password = Hash::make($request->input('password'));
        $student->save();
        return redirect('https://www.aast-trainery.com');
    }
}
