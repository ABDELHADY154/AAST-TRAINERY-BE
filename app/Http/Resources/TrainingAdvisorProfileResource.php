<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainingAdvisorProfileResource extends JsonResource
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
            'image' => asset('storage/images/advisorsLogo/' . $this->advisor_image),
            'name' => $this->advisor_name,
            'title' => $this->advisor_title,
            'bio' => $this->advisor_bio,
            'email' => $this->advisor_email,
            'university' => $this->department->university->university_name,
            'department' => $this->department->department_name,
            'internshipPosts' => CompanyInternshipResource::collection($this->internshipPosts)->resolve(),

        ];
    }
}
