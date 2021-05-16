<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentNotificationResource extends JsonResource
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
            'id' => $this->id,
            'internship' => $this->internship_post_id !== null ? [
                "id" => $this->internshipPost->id,
                "title" => $this->internshipPost->internship_title
            ] : null,
            'session' => $this->session_id !== null ? [
                "id" => $this->session->id,
                "title" => $this->session->title
            ] : null,
            'type' => $this->type,
            'category' => $this->category,
            'message' => $this->message,
            'seen' => $this->seen == 0 ? false : true
        ];
    }
}
