<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternshipPost extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'company_id',
        'internship_title',
        'published_on',
        'company_id',
        'image',
        'vacancy',
        'gender',
        'type',
        'salary',
        'application_deadline',
        'desc',
        'location'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function internshipReqs()
    {
        return $this->hasMany(InternshipRequirement::class);
    }

    public function internDepartments()
    {
        return $this->belongsToMany(StudentDepartment::class, 'internship_post_departments')->withPivot('student_department_id', 'internship_post_id');
    }

    public function studentInterests()
    {
        return $this->hasMany(StudentInterest::class);
    }
}
