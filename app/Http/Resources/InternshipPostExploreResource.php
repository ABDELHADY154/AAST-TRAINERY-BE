<?php

namespace App\Http\Resources;

use App\InternshipPost;
use App\Student;
use Illuminate\Http\Resources\Json\JsonResource;

class InternshipPostExploreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $student = Student::where('id', auth('api')->id())->first();
        $post = InternshipPost::where('id', $this->id)->first();
        $savedStatus = $student->hasFavorited($post);
        if ($this->post_type == 'adsPost') {
            return [
                'id' => $this->id,
                'company_name' => $this->company->company_name,
                'company_logo' => asset('storage/images/companyLogo/' . $this->company->image),
                'description' => $this->desc,
                'post_type' => $this->post_type,
                'sponsor_image' => $this->post_type == 'adsPost' ? asset('storage/images/adsImages/' . $this->sponser_image)  : null,
            ];
        } elseif ($this->post_type == 'companyPost') {

            return [
                'id' => $this->id,
                'company_name' => $this->company->company_name,
                'company_logo' => asset('storage/images/companyLogo/' . $this->company->image),
                'title' => $this->internship_title,
                'description' => $this->desc,
                'application_deadline' => $this->application_deadline,
                'salary' => $this->salary,
                'ended' => $this->ended == 1 ? true : false,
                'post_type' => $this->post_type,
                'departments' => StudentDepartmentResource::collection($this->internDepartments)->resolve(),
                'tags' => StudentInterestResource::collection($this->studentInterests)->resolve(),
                'saved' => $savedStatus
            ];
        } elseif ($this->post_type == 'advisorPost') {
            return [
                'id' => $this->id,
                'advisor' => $this->advisor ? [
                    'id' => $this->advisor->id,
                    'name' => $this->advisor->advisor_name,
                    'image' => asset('storage/images/advisorsLogo/' . $this->advisor->advisor_image),
                ] : null,
                'company_name' => $this->company->company_name,
                'company_logo' => asset('storage/images/companyLogo/' . $this->company->image),
                'title' => $this->internship_title,
                'description' => $this->desc,
                'application_deadline' => $this->application_deadline,
                'salary' => $this->salary,
                'ended' => $this->ended == 1 ? true : false,
                'post_type' => $this->post_type,
                'departments' => StudentDepartmentResource::collection($this->internDepartments)->resolve(),
                'tags' => StudentInterestResource::collection($this->studentInterests)->resolve(),
                'saved' => $savedStatus

            ];
        } elseif ($this->post_type == 'promotedPost') {


            return [
                'id' => $this->id,
                'advisor' => $this->advisor ? [
                    'id' => $this->advisor->id,
                    'name' => $this->advisor->advisor_name,
                    'image' => asset('storage/images/advisorsLogo/' . $this->advisor->advisor_image),
                ] : null,
                'company_name' => $this->company->company_name,
                'company_logo' => asset('storage/images/companyLogo/' . $this->company->image),
                'title' => $this->internship_title,
                'description' => $this->desc,
                'application_deadline' => $this->application_deadline,
                'salary' => $this->salary,
                'ended' => $this->ended == 1 ? true : false,
                'post_type' => $this->post_type,
                'departments' => StudentDepartmentResource::collection($this->internDepartments)->resolve(),
                'tags' => StudentInterestResource::collection($this->studentInterests)->resolve(),
                'saved' => $savedStatus
            ];
        }
    }
}
