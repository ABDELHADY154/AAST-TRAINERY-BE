<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentSkill extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'skill_name', 'years_of_exp', 'student_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
