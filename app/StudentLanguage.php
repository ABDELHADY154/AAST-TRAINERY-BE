<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentLanguage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'student_id', 'language', 'level'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
