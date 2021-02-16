<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentEducation extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'student_id', 'school_name', 'country', 'city', 'from', 'to', 'cred', 'cred_url'
    ];


    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
