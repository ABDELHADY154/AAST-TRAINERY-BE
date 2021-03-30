<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CompanyInternshipPostRequest extends FormRequest
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
            'internship_title' => ['required', 'string'],
            'company_id' => ['required', 'integer', 'exists:companies,id'],
            'vacancy' => ['required', 'integer', 'between:1,50'],
            'gender' => ['required', 'string', 'in:Male,Female,Both'],
            'type' => ['required', 'string', 'in:Full Time,Part Time'],
            'salary' => ['required', 'string', 'in:Paid,Un Paid'],
            'application_deadline' => ['required', 'date'],
            'desc' => ['required', 'string'],
            'location' => ['required', 'string'],
            'location_url' => ['string', 'url', 'nullable'],
            'reqs' => [
                'numeric' => ['required', 'string']
            ],
            'deps' => [
                'numeric' => ['required', 'numeric']
            ]
        ];
    }
}
