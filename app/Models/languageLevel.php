<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class languageLevel extends Model
{
    use HasFactory;

    protected $table = 'language_levels';

    protected $fillable = [
        'curriculum_id',
        'primary_language',
        'primary_language_level',
        'secondary_language',
        'secondary_language_level',
        'extra_language',
        'extra_language_level',
    ];

    public function curriculum()
    {
        return $this->belongsTo(curriculum::class);
    }
}
