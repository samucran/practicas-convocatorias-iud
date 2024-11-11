<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class convocationRelation extends Model
{
    use HasFactory;

    protected $table = 'convocation_relations';  // Especificar el nombre correcto de la tabla

    protected $fillable = [
        'convocation_id',
        'student_id',
        'semester_date',
        'mandatory_practice',
    ];

    // Relaciones
    public function convocation()
    {
        return $this->belongsTo(convocation::class);
    }

    public function student()
    {
        return $this->belongsTo(student::class);
    }
}
