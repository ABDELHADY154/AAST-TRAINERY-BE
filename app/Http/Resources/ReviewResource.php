<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'student_name' => $this->student->name,
            'college' => $this->student->college,
            'rate' => intval($this->rate),
            'comment' => $this->comment,
        ];
    }
}
