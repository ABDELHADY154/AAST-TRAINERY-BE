<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coach extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'bio', 'job_title', 'fb_url', 'in_url', 'y_url', 'insta_url'
    ];
}
