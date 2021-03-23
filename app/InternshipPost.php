<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternshipPost extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'company_id',
        'internship_title',
        'published_on',
        'company_id',
        'image',
        'vacancy',
        'gender',
        'type',
        'salary',
        'application_deadline',
        'desc'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
