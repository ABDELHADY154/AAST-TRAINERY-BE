<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class TrainingAdvisor extends Model
{
    use SoftDeletes, Searchable;

    protected $fillable = [
        'advisor_name',
        'advisor_title',
        'advisor_image',
        'advisor_bio',
        'advisor_email',
        'department_id'
    ];

    public function searchableAs()
    {
        return 'advisors_index';
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }
    public function department()
    {
        return $this->belongsTo(StudentDepartment::class, 'department_id');
    }

    public function internshipPosts()
    {
        return $this->hasMany(InternshipPost::class);
    }
}
