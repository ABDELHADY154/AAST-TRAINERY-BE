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
        'name', 'email', 'password', 'reg_no', 'period', 'gpa', 'image', 'start_year', 'end_year', 'department_id'
    ];

    public function studentDepartment()
    {
        return $this->belongsTo(StudentDepartment::class, 'department_id');
    }
}
