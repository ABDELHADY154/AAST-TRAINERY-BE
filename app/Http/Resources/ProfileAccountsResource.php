<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileAccountsResource extends JsonResource
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
            "instagram" => $this->account_url_instagram,
            "facebook" => $this->account_url_facebook,
            "youtube" => $this->account_url_youtube,
            "linkedin" => $this->account_url_linkedin,
            "github" => $this->account_url_github,
            "behance" => $this->account_url_behance,
        ];
        // return parent::toArray($request);
    }
}
