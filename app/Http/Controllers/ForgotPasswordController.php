<?php

namespace App\Http\Controllers;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Requests\ForgotPasswordRequest;
use App\Student;
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
            $message->subject('Password Reset');
        });
        return $this->created(['message' => 'reset password email sent successfully']);
    }


    public function resetForm($token)
    {
        if (!$passwordResets = DB::table('forget_password_resets')->where('token', $token)->first()) {
            return view('Email.ResetError', ['error' => 'Invalid Token, please check your email!']);
        }
        return view('Email.Form', ['token' => $token]);
    }


    public function reset(Request $request, $token)
    {
        $request->validate([
            'password' => ['required', 'min:6', 'confirmed'],
        ]);
        if (!$passwordResets = DB::table('forget_password_resets')->where('token', $token)->first()) {
            return view('Email.ResetError', ['error' => 'Invalid Token, please check your email!']);
        }
        if (!$student = Student::where('email', $passwordResets->email)->first()) {
            return view('Email.ResetError', ['error' => 'User not found, please check your email!']);
        }
        $student->password = Hash::make($request->input('password'));
        $student->save();
        DB::table('forget_password_resets')->where('email', $passwordResets->email)->delete();
        return redirect('https://www.aast-trainery.com');
    }
}
