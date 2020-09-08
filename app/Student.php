<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Student extends User
{
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'name', 'email', 'password', 'reg_no', 'period', 'gpa', 'college'
    ];
}
