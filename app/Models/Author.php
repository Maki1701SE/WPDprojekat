<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'bio',
        'birth_date'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
