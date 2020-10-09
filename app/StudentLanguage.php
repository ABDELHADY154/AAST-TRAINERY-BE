<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentLanguage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'language', 'level', 'student_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
