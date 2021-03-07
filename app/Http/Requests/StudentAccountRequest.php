<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentAccountRequest extends FormRequest
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
            'website' => ['url'],
            'facebook' => ['regex:/((http|https):\/\/|)(www\.|)facebook\.com\/[a-zA-Z0-9.]{1,}/i'],
            'instagram' => ['regex:/(https?:\/\/)?(www\.)?instagram\.com\/[A-Za-z0-9_.]{1,30}\/?/i'],
            'youtube' => ['regex:/(?:https?:\/\/)?(?:(?:(?:www\.?)?youtube\.com(?:\/(?:(?:watch\?.*?(v=[^&\s]+).*)|(?:v(\/.*))|(channel\/.+)|(?:user\/(.+))|(?:results\?(search_query=.+))))?)|(?:youtu\.be(\/.*)?))/i'],
            'linkedin' => ['regex:/[(https:\/\/www\.linkedin.com)]{20}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&\/=]*)+/i'],
            'behance' => ['regex:/(https?:\/\/)?(www\.)?behance\.net\/[A-Za-z0-9_.]{1,30}\/?/i'],
            'github' => ['regex:/(https?:\/\/)?(www\.)?github\.com\/[A-Za-z0-9_.]{1,30}\/?/i']

        ];
    }
}
