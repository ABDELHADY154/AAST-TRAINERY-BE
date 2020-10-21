<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileCourseResource extends JsonResource
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
            'course_category' => $this->course_category,
            'course_name' => $this->course_name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'course_url' => $this->course_url
        ];
        // return parent::toArray($request);
    }
}
