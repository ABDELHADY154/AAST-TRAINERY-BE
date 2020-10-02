<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class College extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'college_name', 'logo'
    ];


    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}
