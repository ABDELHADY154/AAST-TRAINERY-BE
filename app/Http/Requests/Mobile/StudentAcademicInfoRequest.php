<?php

namespace App\Http\Requests\Mobile;

use Illuminate\Foundation\Http\FormRequest;

class StudentAcademicInfoRequest extends FormRequest
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
            'university' => ['required', 'string'],
            'department_id' => ['required', 'integer', 'exists:student_departments,id'],
            'reg_no' => ['required', 'integer', 'digits:8', 'unique:students,reg_no'],
            'period' => ['required', 'integer', 'max:8'],
            'gpa' => ['required', 'numeric', 'between:1.0,4'],
            'start_year' => ['required', "integer", 'between:2005,2030'],
            'end_year' => ['required', "integer", 'between:2005,2030'],
        ];
    }
}
