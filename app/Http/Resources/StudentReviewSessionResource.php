<?php

namespace App\Http\Resources;

use App\Session;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentReviewSessionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $post = Session::find($this->pivot->session_id);
        return [
            'session_type' => $post->title,
            'comment' => $this->pivot->comment,
            'fullName' => $this->name,
            'rate' => $this->pivot->rate,

        ];
    }
}
