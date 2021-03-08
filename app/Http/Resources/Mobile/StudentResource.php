<?php

namespace App\Http\Resources\Mobile;

use App\Http\Resources\StudentAccountResource;
use App\Http\Resources\StudentCourseResource;
use App\Http\Resources\StudentEducationResource;
use App\Http\Resources\StudentInterestResource;
use App\Http\Resources\StudentLanguageResource;
use App\Http\Resources\StudentSkillResource;
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
            "name" => $this->name,
            "image" => asset('storage/images/avatars/' . $this->image),
            "email" => $this->email,
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
            'profile_updated' => $this->profile_updated,
            'profile_score' => $this->profile_score,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'university' => $this->university,
            'department' => $this->studentDepartment->department_name,
            'reg_no' => $this->reg_no,
            'period' => $this->period,
            'gpa' => $this->gpa,
            'start_year' => $this->start_year,
            'end_year' => $this->end_year,
            // 'accounts' => (new StudentAccountResource($this->studentAccount))->resolve(),
            // 'educations' => StudentEducationResource::collection($this->studentEducations)->resolve(),
            // 'work_experience' => StudentWorkExperienceResource::collection($this->studentExperience)->resolve(),
            // 'courses' => StudentCourseResource::collection($this->studentCourses)->resolve(),
            // 'skills' => StudentSkillResource::collection($this->studentSkills)->resolve(),
            // 'interests' => StudentInterestResource::collection($this->studentInterests)->resolve(),
            // 'languages' => StudentLanguageResource::collection($this->studentLanguages)->resolve(),
            "created_at" => $this->created_at->timestamp,
        ];
    }
}
