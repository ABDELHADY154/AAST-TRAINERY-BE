<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentAccount extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'website', 'facebook', 'instagram', 'linkedin', 'youtube', 'behance', 'github', 'student_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
