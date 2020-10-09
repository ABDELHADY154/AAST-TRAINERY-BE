<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileCourse extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'course_name', 'course_category', 'course_url', 'additional_info', 'student_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
