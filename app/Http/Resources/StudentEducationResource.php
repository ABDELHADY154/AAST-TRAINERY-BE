<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentEducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'school_name' => $this->school_name,
            'country' => $this->country,
            'city' => $this->city,
            'from' => $this->from,
            'to' => $this->to,
            'credential' => $this->cred ? asset('storage/files/student/educations/' . $this->cred) : null,
            'credential_url' => $this->cred_url,
        ];
    }
}
