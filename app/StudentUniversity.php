<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentUniversity extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'university_name'
    ];

    public function deparments()
    {
        return $this->hasMany(StudentDepartment::class);
    }
}
