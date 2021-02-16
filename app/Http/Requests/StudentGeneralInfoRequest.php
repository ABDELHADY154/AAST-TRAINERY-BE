<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentGeneralInfoRequest extends FormRequest
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
            'reg_no' => ['required', 'integer'],
            'period' => ['required', 'integer', 'between:2,9'],
            'gpa' => ['required', 'between:0,99.99'],
            'image' => ['image', 'mimes:png,jpg,jpeg'],
            'start_year' => ['required', 'integer'],
            'end_year' => ['required', 'integer'],
            'department_id' => ['required', 'integer', 'exists:student_departments,id'],
            'gender' => ['required', 'string', 'max:6', 'ends_with:e'],
            'date_of_birth' => ['required', 'date'],
            'nationality' => ['required', 'string'],
            'country' => ['required', 'string'],
            'city' => ['required', 'string'],
            'university' => ['required', 'string'],
            'phone_number' => ['required', 'numeric']
        ];
    }
}
