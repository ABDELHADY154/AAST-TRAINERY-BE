<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkExperience extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'experience_type', 'job_title', 'company_name', 'company_website', 'country', 'city', 'start_date', 'end_date',
        'end_date', 'additional_info', 'student_id'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_id');
    }
}
