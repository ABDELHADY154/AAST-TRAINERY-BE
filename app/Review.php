<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rate', 'student_id', 'comment'
    ];


    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
