<?php

namespace App\Http\Resources\Mobile;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentPersonalInfoResource extends JsonResource
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
            'fullName' => $this->name,
            'gender' => $this->gender,
            'dob' => $this->date_of_birth,
            'nationality' => $this->nationality,
            'country' => $this->country,
            'city' => $this->city,
            'phoneNumber' => $this->phone_number,
        ];
    }
}
