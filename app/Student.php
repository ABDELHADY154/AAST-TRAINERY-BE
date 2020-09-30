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
        'name', 'email', 'password', 'reg_no', 'period', 'gpa', 'college_id'
    ];


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}