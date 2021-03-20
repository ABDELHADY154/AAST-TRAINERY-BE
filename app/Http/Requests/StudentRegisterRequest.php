<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRegisterRequest extends FormRequest
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
            'name' => ['required', "regex:/[a-z][A-Z]$/i"],
            'email' => ['required', 'email', 'unique:students,email'], //regex:/(.*)@myemail\.com/i
            'password' => ['required', 'min:6', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.]).{2,}$/', 'confirmed'],
            'reg_no' => ['required', 'integer', 'digits:8', 'unique:students,reg_no'],
            'gender' => ['required', 'in:male,female'],
            'department_id' => ['required', 'exists:student_departments,id']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please Enter Your Full Name',
            'name.regex' => 'Numbers or Symbols are Not Allowed',
            'email.required' => 'Please Enter Your Student Email',
            'email.email' => 'This Student Email is invalid',
            'gender.required' => 'Please Choose Your Gender',
            'gender.in' => 'Gender is Invalid',
            'password.required' => 'Please Enter Your Password',
            'password.min' => 'Password Must be At least 6 Characters',
            'password.regex' => 'Your Password Must Contain Upper and lower case, Numbers and Symbols',
            'password.confirm' => 'Password Confirmation Does Not Match',
            "reg_no.required" => 'Please Enter Your Registration Number',
            "reg_no.integer" => 'Letters or Symbols are Not Allowed',
            'reg_no.digits' => 'Registration Number Must be 8 Numbers',
            'department_id.required' => 'Please Select Your Department',
            'department_id.exists' => 'Department Not Found',
        ];
    }
}
