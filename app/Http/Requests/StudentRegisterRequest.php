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
            'password' => ['required', 'min:6', 'confirmed'],
            'reg_no' => ['required', 'integer'],
            'department_id' => ['required', 'exists:student_departments,id']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Full Name is Required',
            'name.regex' => 'Full Name must contain letters only',
            'password.required' => 'Password field is required',
            'password.min' => 'Password must at least 6 charachters',
            "reg_no.required" => 'Registeration Number Field is required',
            'department_id.required' => 'Please choose your department',
            'department_id.exists' => 'Department Not Found'
        ];
    }
}
