<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// class SchoolClass extends Model
// {
//     protected $fillable = [
//         'school_id',
//         'class_name',
//         'status'
//     ];

//     public function sections()
//     {
//         return $this->hasMany(Section::class);
//     }

//     public function school()
//     {
//         return $this->belongsTo(School::class);
//     }
// }
class SchoolClass extends Model
{
    protected $fillable = [
        'school_id',
        'class_name',
        'status'
    ];

    // Class → Sections
    public function sections()
    {
        return $this->hasMany(Section::class, 'class_id', 'id')
            ->where('status', 1);
    }

    // Class → School
    public function school()
    {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
}
