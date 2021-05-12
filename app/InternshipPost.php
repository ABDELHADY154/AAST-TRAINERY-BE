<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class InternshipPost extends Model
{
    use SoftDeletes, Searchable, Favoriteable;
    protected $fillable = [
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
        'location',
        'ended',
        'post_type',
        'location_url',
        'training_advisor_id',
        'sponser_image'
    ];


    public function searchableAs()
    {
        return 'posts_index';
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function advisor()
    {
        return $this->belongsTo(TrainingAdvisor::class, 'training_advisor_id');
    }

    public function internshipReqs()
    {
        return $this->hasMany(InternshipRequirement::class);
    }

    public function internDepartments()
    {
        return $this->belongsToMany(StudentDepartment::class, 'internship_post_departments')->withPivot('student_department_id', 'internship_post_id');
    }

    public function appliedStudents()
    {
        return $this->belongsToMany(Student::class, 'student_internship_post_apply')->withPivot('student_id', 'internship_post_id', 'application_status', 'application_date');
    }

    public function studentInterests()
    {
        return $this->hasMany(StudentInterest::class);
    }
    public function studentReviews()
    {
        return $this->belongsToMany(Student::class, 'student_internship_post_reviews')->withPivot(
            'student_id',
            'internship_post_id',
            'comment',
            'rate'
        );
    }
}
