<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_name',
        'program_profile',
        'faculty_id',
    ];

    public function faculty()
    {
        return $this->belongsTo(faculty::class);
    }
}
