<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentSkill extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'skill_name', 'exp_years', 'jusification', 'student_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
