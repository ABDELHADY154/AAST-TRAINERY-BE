<?php

namespace App\Http\Resources;

use App\InternshipPost;
use App\Student;
use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\PseudoTypes\True_;

class PostReq extends JsonResource
{
    public function toArray($request)
    {
        return [
            'req' => $this->req
        ];
    }
}

class InternshipPostResource extends JsonResource
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
        $application = $student->applications()->where('internship_post_id', $this->id)->first();
        $applied = $application ? true : false;
        return [
            'id' => $this->id,
            'company_id' => $this->company->id,
            'company_name' => $this->company->company_name,
            'company_logo' => asset('storage/images/companyLogo/' . $this->company->image),
            'title' => $this->internship_title,
            'description' => $this->desc,
            'application_deadline' => $this->application_deadline,
            'salary' => $this->salary,
            'vacancy' => $this->vacancy,
            'gender' => $this->gender,
            'type' => $this->type,
            'published_on' => $this->published_on,
            'location' => $this->location,
            'location_url' => $this->location_url,
            'post_type' => $this->post_type,
            'requirements' => PostReq::collection($this->internshipReqs)->resolve(),
            'departments' => StudentDepartmentResource::collection($this->internDepartments)->resolve(),
            'tags' => StudentInterestResource::collection($this->studentInterests)->resolve(),
            'saved' => $savedStatus,
            'applied' => $applied
        ];
    }
}
