<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.]).{2,}$/'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Please Enter Your Email',
            'email.email' => 'The Entered Email is Incorrect',
            'password.required' => 'Please Enter Your Password',
            'password.min' => 'Your Password Must be At Least 6 Charachters',
            'password.regex' => 'Your Password Must Contain Upper and lower case, Numbers and Symbols'
        ];
    }
}
