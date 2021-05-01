<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoachResource extends JsonResource
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
            'image' => asset('storage/images/coaches/' . $this->image),
            'name' => $this->name,
            'jobTitle' => $this->job_title,
            'fb_url' => $this->fb_url,
            'in_url' => $this->in_url,
            'y_url' => $this->y_url,
            'insta_url' => $this->insta_url

        ];
    }
}
