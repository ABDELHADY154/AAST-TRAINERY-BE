<?php

namespace App\Http\Resources;

use App\Session;
use App\Student;
use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
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
        $session = Session::where('id', $this->id)->first();
        $booked = false;
        if ($session) {
            foreach ($student->sessions as $studentSession) {
                if ($studentSession->pivot->session_id == $session->id && $studentSession->pivot->student_id == $student->id) {
                    $booked = true;
                }
            }
        }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'desc' => $this->desc,
            'price' => $this->price,
            'image' => asset('storage/images/sessions/' . $this->image),
            'booked' => $booked
        ];
    }
}
