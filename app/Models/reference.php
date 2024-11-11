<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reference extends Model
{
    use HasFactory;

    protected $table = 'references';

    protected $fillable = [
        'curriculum_id',
        'name',
        'position',
        'phone',
    ];

    public function curriculum()
    {
        return $this->belongsTo(curriculum::class, 'curriculum_id');
    }
}
