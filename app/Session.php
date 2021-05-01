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
}
