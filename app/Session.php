<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'desc',
        'price',
        'image',
        'coach_id'
    ];

    public function coach()
    {
        return $this->belongsTo(Coach::class, 'coach_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_sessions')->withPivot('student_id', 'session_id', 'booking_date', 'book_status');
    }
    public function studentReviews()
    {
        return $this->belongsToMany(Student::class, 'student_session_reviews')->withPivot(
            'student_id',
            'session_id',
            'comment',
            'rate',
            'id'
        );
    }
}
