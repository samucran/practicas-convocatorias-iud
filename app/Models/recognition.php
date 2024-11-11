<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recognition extends Model
{
    use HasFactory;

    protected $fillable = [
        'curriculum_id',
        'name',
        'position',
        'phone',
    ];

    public function curriculum()
    {
        return $this->belongsTo(curriculum::class);
    }
}
