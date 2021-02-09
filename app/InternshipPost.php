<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternshipPost extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'internship_title', 'date'
    ];
}
