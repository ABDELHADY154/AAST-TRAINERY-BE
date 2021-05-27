<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyLogoesResource extends JsonResource
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
            'logo' => asset('storage/images/companyLogo/' . $this->image),
            'company_name' => $this->company_name,
            'field' => $this->company_field

        ];
    }
}
