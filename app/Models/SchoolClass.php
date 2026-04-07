<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $fillable = [
        'class_name'
    ];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
