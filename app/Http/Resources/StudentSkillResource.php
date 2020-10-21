<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentSkillResource extends JsonResource
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
            'skill_name' => $this->skill_name,
            'level' => $this->level,
            'experience' => ($this->exp_years > 1) ? $this->exp_years . ' years' : $this->exp_years . ' year'
        ];
        // return parent::toArray($request);
    }
}
