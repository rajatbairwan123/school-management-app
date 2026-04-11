<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'school_id',
        'name',
        'slug',
        'email',
        'phone',
        'address'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
