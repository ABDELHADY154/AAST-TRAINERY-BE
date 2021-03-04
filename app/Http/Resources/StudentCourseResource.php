<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentCourseResource extends JsonResource
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
            'course_name' => $this->course_name,
            'course_provider' => $this->course_provider,
            'cred' =>  $this->cred ? asset('storage/files/student/course/' . $this->cred) : null,
            'cred_url' => $this->cred_url
        ];
    }
}
