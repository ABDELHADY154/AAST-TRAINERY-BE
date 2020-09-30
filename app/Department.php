<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'dep_name', 'college_id'
    ];


    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
