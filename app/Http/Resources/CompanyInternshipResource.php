<?php

namespace App\Http\Resources;

use App\InternshipPost;
use App\Student;
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
        $student = Student::where('id', auth('api')->id())->first();
        $post = InternshipPost::where('id', $this->id)->first();
        $savedStatus = $student->hasFavorited($post);
        $appliedStatus = false;
        // $applicationStatus = false;
        // $accomplishedStatus = false;
        // foreach ($post->appliedStudents as $stu) {
        //     if ($stu->pivot->student_id == $student->id && $stu->pivot->internship_post_id == $post->id) {
        //         $appliedStatus = true;
        //         if ($stu->pivot->application_status == "accepted") {
        //             $applicationStatus = true;
        //         }
        //         if ($stu->pivot->application_status == "achieved") {
        //             $accomplishedStatus = true;
        //         }
        //     }
        // }
        $applicationStatus = false;
        $accomplishedStatus = false;
        foreach ($post->appliedStudents as $stu) {
            if ($stu->pivot->student_id == $student->id && $stu->pivot->internship_post_id == $post->id) {
                $applicationStatus = "applied";
                if ($stu->pivot->application_status == "accepted") {
                    $applicationStatus = "accepted";
                }
                if ($stu->pivot->application_status == "achieved") {
                    $applicationStatus = "achieved";
                }
            }
        }
        $reviewStatus = false;
        foreach ($post->studentReviews as $review) {
            if ($review->pivot->student_id == $student->id && $review->pivot->internship_post_id == $post->id) {
                $reviewStatus = true;
            }
        }
        return [
            'id' => $this->id,
            'company_id' => $this->company->id,
            'company_name' => $this->company->company_name,
            'company_logo' => asset('storage/images/companyLogo/' . $this->company->image),
            'advisor' => $this->advisor ? [
                'id' => $this->advisor->id,
                'name' => $this->advisor->advisor_name,
                'image' => asset('storage/images/advisorsLogo/' . $this->advisor->advisor_image),
            ] : null,
            'title' => $this->internship_title,
            'description' => $this->desc,
            'application_deadline' => $this->application_deadline,
            'salary' => $this->salary,
            'ended' => $this->ended == 1 ? true : false,
            'post_type' => $this->post_type,
            'sponsor_image' => $this->post_type == 'adsPost' ? asset('storage/images/adsImages/' . $this->sponser_image)  : null,
            'departments' => StudentDepartmentResource::collection($this->internDepartments)->resolve(),
            'tags' => StudentInterestResource::collection($this->studentInterests)->resolve(),
            'saved' => $savedStatus,
            // 'applied' => $appliedStatus,
            // 'accepted' => $applicationStatus,
            // 'accomplished' => $accomplishedStatus,
            'status' => $applicationStatus,
            'reviewed' => $reviewStatus
        ];
    }
}
