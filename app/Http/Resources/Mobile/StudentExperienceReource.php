<?php

namespace App\Http\Resources\Mobile;

use App\Http\Resources\StudentCourseResource;
use App\Http\Resources\StudentEducationResource;
use App\Http\Resources\StudentInterestResource;
use App\Http\Resources\StudentLanguageResource;
use App\Http\Resources\StudentSkillResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentExperienceReource extends JsonResource
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
            'educations' => StudentEducationResource::collection($this->studentEducations)->resolve(),
            'work_experience' => StudentWorkExperienceResource::collection($this->studentExperience)->resolve(),
            'courses' => StudentCourseResource::collection($this->studentCourses)->resolve(),
            'skills' => StudentSkillResource::collection($this->studentSkills)->resolve(),
            'interests' => StudentInterestResource::collection($this->studentInterests)->resolve(),
            'languages' => StudentLanguageResource::collection($this->studentLanguages)->resolve(),
        ];
    }
}
