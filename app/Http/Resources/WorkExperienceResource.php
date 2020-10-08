<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkExperienceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $duration = date_diff(date_create($this->start_date), date_create($this->end_date))->days;
        return [
            'id' => $this->id,
            'experience_type' => $this->experience_type,
            'job_title' => $this->job_title,
            'company_name' => $this->company_name,
            'country' => $this->country,
            'city' => $this->city,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'duration' => ((int)($duration / 30) <= 1) ? round(($duration / 30), 1) . ' Month' : round(($duration / 30), 1) . ' Months'
        ];
        // return parent::toArray($request);
    }
}
