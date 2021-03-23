<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternshipRequirement extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'req', 'internship_post_id'
    ];

    public function internshipPost()
    {
        return $this->belongsTo(InternshipPost::class, 'internship_post_id');
    }
}
