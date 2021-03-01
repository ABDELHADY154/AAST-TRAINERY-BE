<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentGeneralInfoResource extends JsonResource
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
            'fullName' => $this->name,
            'gender' => $this->gender,
            'dob' => $this->date_of_birth,
            'nationality' => $this->nationality,
            'country' => $this->country,
            'city' => $this->city,
            'phoneNumber' => $this->phone_number,
            'university' => $this->university,
            'department' => $this->studentDepartment->department_name,
            'regNumber' => $this->reg_no,
            'period' => $this->period,
            'GPA' => $this->gpa,
            'startYear' => $this->start_year,
            'endYear' => $this->end_year
        ];
    }
}
