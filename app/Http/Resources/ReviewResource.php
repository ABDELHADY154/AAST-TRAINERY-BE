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
            'id' => $this->id,
            'student_name' => $this->student->name,
            'rate' => intval($this->rate),
            'comment' => $this->comment,
            'college' => new CollegeResource($this->student->college),
            'department' => new DepartmentResource($this->student->department),

        ];
    }
}
