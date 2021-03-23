<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'image',
        'company_name',
        'address',
        'company_field',
        'company_desc',
        'phone_number',
        'website',
        'email'
    ];

    public function internshipPosts()
    {
        return $this->hasMany(InternshipPost::class);
    }
}
