<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'image' => asset('storage/images/logo/' . $this->image),
            'company_name' => $this->company_name,
            'address' => $this->address,
            'company_field' => $this->company_field,
            'company_desc' => $this->company_desc,
            'phone_number' => $this->phone_number,
            'website' => $this->website,
            'email' => $this->email,
            'internshipPosts' => CompanyInternshipResource::collection($this->internshipPosts)->resolve()
        ];
    }
}
