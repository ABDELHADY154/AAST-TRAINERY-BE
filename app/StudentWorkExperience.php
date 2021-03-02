<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentWorkExperience extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'student_id', 'cred', 'cred_url', 'currently_work', 'to', 'from', 'city', 'country', 'company_website', 'company_name', 'job_title', 'experience_type', 'student_id'
    ];


    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
