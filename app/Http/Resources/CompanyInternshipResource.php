<?php

namespace App\Http\Resources;

use App\StudentDepartment;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyInternshipResource extends JsonResource
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
            'company_name' => $this->company->company_name,
            'company_logo' => $this->image,
            'description' => $this->desc,
            'application_deadline' => $this->application_deadline,
            'salary' => $this->salary,
            'departments' => StudentDepartmentResource::collection($this->internDepartments)->resolve(),
            'tags' => StudentInterestResource::collection($this->studentInterests)->resolve()
        ];
    }
}
