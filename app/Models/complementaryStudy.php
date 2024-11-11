<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complementaryStudy extends Model
{
    use HasFactory;

    protected $table = 'complementary_studies';

    protected $fillable = ['curriculum_id', 'name', 'institution', 'intensity', 'date'];

    public function curriculum()
    {
        return $this->belongsTo(curriculum::class);
    }
}
