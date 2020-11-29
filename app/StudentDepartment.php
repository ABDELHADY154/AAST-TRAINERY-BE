<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentDepartment extends Model
{
    use SoftDeletes;

    protected $fillable = ['department_name'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
