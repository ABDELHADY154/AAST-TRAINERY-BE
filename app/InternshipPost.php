<?php

namespace App;

use App\Http\Resources\InternshipPostExploreResource;
use App\Http\Resources\StudentDepartmentResource;
use App\Http\Resources\StudentInterestResource;
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
            'rate',
            'id'
        );
    }

    public function notifications()
    {
        return $this->hasMany(StudentNotification::class);
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array['company'] = [
            'company_id' => $this->company->id,
            'company_name' => $this->company->company_name,
            'company_logo' => asset('storage/images/companyLogo/' . $this->company->image),
        ];
        $array['departments'] = StudentDepartmentResource::collection($this->internDepartments)->resolve();
        $array['tags'] = StudentInterestResource::collection($this->studentInterests)->resolve();
        $array['advisor'] = $this->advisor ? [
            'id' => $this->advisor->id,
            'name' => $this->advisor->advisor_name,
            'image' => asset('storage/images/advisorsLogo/' . $this->advisor->advisor_image),
        ] : null;
        $array['sponser_image'] = $this->post_type == 'adsPost' ? asset('storage/images/adsImages/' . $this->sponser_image)  : null;
        return $array;
    }
}
