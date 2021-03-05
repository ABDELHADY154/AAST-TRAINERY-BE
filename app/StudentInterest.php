<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentInterest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'interest', 'student_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
