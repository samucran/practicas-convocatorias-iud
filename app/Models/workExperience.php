<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workExperience extends Model
{
    use HasFactory;

    protected $table = 'work_experiences';

    protected $fillable = [
        'curriculum_id',
        'company',
        'position',
        'duration',
        'phone',
        'start_date',
        'end_date',
    ];

    public function curriculum()
    {
        return $this->belongsTo(curriculum::class);
    }
}
