<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternshipPostDepartment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'internship_post_id', 'department_id'
    ];

    public function internshipPost()
    {
        return $this->belongsTo(InternshipPost::class, 'internship_post_id');
    }

    public function department()
    {
        return $this->belongsTo(StudentDepartment::class, 'department_id');
    }
}
