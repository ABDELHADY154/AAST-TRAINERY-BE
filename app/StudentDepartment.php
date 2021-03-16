<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentDepartment extends Model
{
    use SoftDeletes;

    protected $fillable = ['department_name', 'university_id'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function university()
    {
        return $this->belongsTo(StudentUniversity::class, 'university_id');
    }
}
