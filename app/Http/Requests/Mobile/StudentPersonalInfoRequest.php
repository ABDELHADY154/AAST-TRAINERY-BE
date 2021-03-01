<?php

namespace App\Http\Requests\Mobile;

use Illuminate\Foundation\Http\FormRequest;

class StudentPersonalInfoRequest extends FormRequest
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
            'name' => ['required', 'string', "regex:/[a-z][A-Z]$/i"],
            'gender' => ['required', 'in:male,female'],
            'phoneNumber' => ['required', "numeric"],
            'date_of_birth' => ["required", 'date'],
            'nationality' => ['required', 'string', "regex:/[a-z][A-Z]$/i"],
            'country' => ['required', 'string', "regex:/[a-z][A-Z]$/i"],
            'city' => ['required', 'string', "regex:/[a-z][A-Z]$/i"]
        ];
    }
}
