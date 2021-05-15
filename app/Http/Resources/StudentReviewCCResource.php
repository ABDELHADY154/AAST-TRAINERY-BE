<?php

namespace App\Http\Resources;

use App\Session;
use App\Student;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentReviewCCResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $post = Session::find($this->session_id);
        $student = Student::find($this->student_id);
        return [
            'session_type' => $post->title,
            'comment' => $this->comment,
            'fullName' => $student->name,
            'rate' => $this->rate,

        ];
    }
}
