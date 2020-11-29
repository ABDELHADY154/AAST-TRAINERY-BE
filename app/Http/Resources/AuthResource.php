<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this[0]->studentDepartments);
        $date = explode("-", $this[0]->date_of_birth);
        return [
            'id' => $this[0]->id,
            'token' => $this[1], //$this[0]->token(),
            "name" => $this[0]->name,
            "image" => asset('storage/images/avatars/' . $this[0]->image),
            "email" => $this[0]->email,
            'department' => $this[0]->studentDepartment->department_name,
            // 'start_year' => $this[0]->start_year,
            // 'end_year' => $this[0]->end_year,
            // 'date_of_birth' => $this[0]->date_of_birth,
            // 'age' =>  $this[0]->date_of_birth ? now()->year - $date['0'] : null,
            "reg_no" => $this[0]->reg_no,
            // 'gender' => $this[0]->gender,
            // "period" => $this[0]->period,
            // "gpa" => $this[0]->gpa,
            // 'nationality' => $this[0]->nationality,
            // 'country' => $this[0]->country,
            // 'city' => $this[0]->city,
            // 'address' => $this[0]->address,
            // 'phone_number' => $this[0]->phone_number,
            "created_at" => $this[0]->created_at->timestamp,
        ];
    }
}
