<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentWorkExperienceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $date1 = explode("-", $this->from);
        $date2 = explode("-", $this->to);
        return [
            'id' => $this->id,
            'job_title' => $this->job_title,
            'company_name' => $this->company_name,
            'company_website' => $this->company_website,
            'experience_type' => $this->experience_type,
            'city' => $this->city,
            'country' => $this->country,
            'from' => $this->from,
            'to' => $this->to,
            'duration' => $date2[0] > $date1[0] ? $date2[0] - $date1[0] : $date1[0] - $date2[0],
            'cred' => $this->cred ? asset('storage/files/student/experience/' . $this->cred) : null,
            'cred_url' => $this->cred_url

        ];
    }
}
