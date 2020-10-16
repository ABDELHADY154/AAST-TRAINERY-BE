<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileAccounts extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'account_url_instagram',
        'account_url_facebook',
        'account_url_youtube',
        'account_url_linkedin',
        'account_url_github',
        'account_url_behance',
        'student_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
