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
        $date = explode("-", $this->date_of_birth);
        return [
            'id' => $this->id,
            "name" => $this->name,
            "image" => asset('storage/images/avatars/' . $this->image),
            "email" => $this->email,
            'department' => $this->studentDepartment->department_name,
            'start_year' => $this->start_year,
            'end_year' => $this->end_year,
            'date_of_birth' => $this->date_of_birth,
            'age' =>  $this->date_of_birth ? now()->year - $date['0'] : null,
            "reg_no" => $this->reg_no,
            'gender' => $this->gender,
            "period" => $this->period,
            "gpa" => $this->gpa,
            'nationality' => $this->nationality,
            'country' => $this->country,
            'city' => $this->city,
            'university' => $this->university,
            'phone_number' => $this->phone_number,
            "created_at" => $this->created_at->timestamp,
        ];
    }
}
