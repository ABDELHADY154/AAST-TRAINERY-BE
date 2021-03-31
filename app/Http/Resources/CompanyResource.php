<?php

namespace App\Http\Resources;

use App\InternshipPost;
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
        $internshipPosts  = $this->internshipPosts;



        return [
            'logo' => asset('storage/images/companyLogo/' . $this->image),
            'company_name' => $this->company_name,
            'address' => $this->address,
            'company_field' => $this->company_field,
            'company_desc' => $this->company_desc,
            'phone_number' => $this->phone_number,
            'website' => $this->website,
            'email' => $this->email,
            'internshipPosts' => [
                'ended' => CompanyInternshipResource::collection($internshipPosts->where('ended', 1))->resolve(),
                'open' => CompanyInternshipResource::collection($internshipPosts->where('ended', 0))->resolve()
            ]
        ];
    }
}
