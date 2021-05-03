<?php

namespace App\Http\Resources;

use App\InternshipPost;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentReviewPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $post = InternshipPost::find($this->pivot->internship_post_id);
        return [
            'comment' => $this->pivot->comment,
            'fullName' => $this->name,
            'training_role' => $post->internship_title,
            'rate' => $this->pivot->rate,

        ];
    }
}
