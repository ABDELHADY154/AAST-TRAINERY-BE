<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentAcademicInfoResource extends JsonResource
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
            'university' => $this->university,
            'department' => $this->studentDepartment->department_name,
            'reg_no' => $this->reg_no,
            'period' => $this->period,
            'gpa' => $this->gpa,
            'start_year' => $this->start_year,
            'end_year' => $this->end_year
        ];
    }
}
