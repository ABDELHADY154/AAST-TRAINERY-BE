<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CollegeResource extends JsonResource
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
            'college_name' => $this->college_name,
            'logo' => asset('storage/images/logo/' . $this->logo),
            // 'departments' =>  DepartmentResource::collection($this->departments),
        ];
    }
}
