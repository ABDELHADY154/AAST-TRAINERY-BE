<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Company extends Model
{
    use SoftDeletes, Searchable;
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
    public function searchableAs()
    {
        return 'companies_index';
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }
    public function internshipPosts()
    {
        return $this->hasMany(InternshipPost::class);
    }
}
