<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentWorkExperienceRequest extends FormRequest
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
            'experience_type' => ['required', 'string', "in:Internship,Volunteer"],
            'job_title' => ['required', 'string'],
            'company_name' => ['required', 'string'],
            'company_website' => ['required', 'url'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
            'cred' => ['file', 'mimes:pdf,docx,doc,txt'],
            'cred_url' => ['url'],
            "currently_work" => ['required', 'boolean']
        ];
    }
}
