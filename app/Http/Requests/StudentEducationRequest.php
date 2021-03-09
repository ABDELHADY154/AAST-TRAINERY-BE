<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentEducationRequest extends FormRequest
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
            'school_name' => ['required', 'string'],
            'cred' => ['file', 'mimes:pdf,docx,doc,txt'],
            'cred_url' => ['url'],
            'country' => ['required', 'string'],
            'city' => ['required', 'string'],
            'from' => ['required', 'date', 'date_format:Y-m-d'],
            'to' => ['required', 'date', 'date_format:Y-m-d'],
        ];
    }

    public function messages()
    {
        return [
            "from.date_format" => "The Date Format Not Valid",
            "to.date_format" => "The Date Format Not Valid"
        ];
    }
}
