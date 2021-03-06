<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Student extends User
{
    use HasApiTokens, Notifiable, SoftDeletes;
    protected $fillable = [
        'name', 'email', 'password', 'reg_no', 'period', 'gpa', 'image', 'start_year',
        'end_year', 'department_id', 'gender', 'date_of_birth', 'nationality',
        'country', 'city', 'university', 'phone_number'
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
}
