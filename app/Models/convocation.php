<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class convocation extends Model
{
    use HasFactory;

    protected $table = 'convocations';

    protected $fillable = [
        'has_agency',
        'start_date',
        'end_date',
        'modality_id',
        'agency_id'
    ];

    public function modality()
    {
        return $this->belongsTo(modality::class);
    }

    public function agency()
    {
        return $this->belongsTo(agency::class);
    }
}
