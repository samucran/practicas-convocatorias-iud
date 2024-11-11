<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class study extends Model
{
    use HasFactory;

    protected $table = 'studies';

    protected $fillable = [
        'curriculum_id',
        'institution',
        'title',
        'year',
        'institution_extra',
        'title_extra',
        'year_extra'
    ];

    public function curriculum()
    {
        return $this->belongsTo(curriculum::class);
    }
}
