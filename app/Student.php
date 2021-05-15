<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Overtrue\LaravelFavorite\Traits\Favoriter;

class Student extends User
{
    use HasApiTokens, Notifiable, SoftDeletes, Favoriter;
    protected $fillable = [
        'name', 'email', 'password', 'reg_no', 'period', 'gpa', 'image', 'start_year',
        'end_year', 'department_id', 'gender', 'date_of_birth', 'nationality',
        'country', 'city', 'university', 'phone_number', 'profile_score', "profile_updated"
    ];


    public function studentDepartment()
    {
        return $this->belongsTo(StudentDepartment::class, 'department_id');
    }

    public function studentEducations()
    {
        return $this->hasMany(StudentEducation::class);
    }

    public function studentExperience()
    {
        return $this->hasMany(StudentWorkExperience::class);
    }

    public function studentCourses()
    {
        return $this->hasMany(StudentCourse::class);
    }

    public function studentSkills()
    {
        return $this->hasMany(StudentSkill::class);
    }

    public function studentInterests()
    {
        return $this->hasMany(StudentInterest::class);
    }
    public function studentLanguages()
    {
        return $this->hasMany(StudentLanguage::class);
    }

    public function studentAccount()
    {
        return $this->hasOne(StudentAccount::class);
    }

    public function applications()
    {
        return $this->belongsToMany(InternshipPost::class, 'student_internship_post_apply')->withPivot('student_id', 'internship_post_id', 'application_status', 'application_date');
    }

    public function sessions()
    {
        return $this->belongsToMany(Session::class, 'student_sessions')->withPivot('student_id', 'session_id', 'booking_date');
    }

    public function postReviews()
    {
        return $this->belongsToMany(InternshipPost::class, 'student_internship_post_reviews')->withPivot(
            'student_id',
            'internship_post_id',
            'comment',
            'rate',
            'id'
        );
    }
}
