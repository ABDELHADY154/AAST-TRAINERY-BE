<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentNotification extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'student_id', 'session_id', 'internship_post_id', 'category', 'message', 'type', 'seen'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function internshipPost()
    {
        return $this->belongsTo(InternshipPost::class, 'internship_post_id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id');
    }
}
