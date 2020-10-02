<?php

namespace App\Http\Resources;

use Carbon\Traits\Timestamp;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            "name" => $this->name,
            "image" => asset('storage/images/avatars/' . $this->image),
            // dd($this->image),
            "email" => $this->email,
            "reg_no" => $this->reg_no,
            "period" => $this->period,
            "gpa" => $this->gpa,
            "college" => $this->college->college_name,
            "department" => $this->department ? $this->department->dep_name : null,
            "created_at" => $this->created_at->timestamp,
        ];
    }
}
