<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingAdvisor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'advisor_name',
        'advisor_title',
        'advisor_image',
        'advisor_bio',
        'advisor_email',
        'department_id'
    ];

    public function department()
    {
        return $this->belongsTo(StudentDepartment::class, 'department_id');
    }

    public function internshipPosts()
    {
        return $this->hasMany(InternshipPost::class);
    }
}
