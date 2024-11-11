<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculums';

    protected $fillable = ['student_id', 'professional_profile'];

    /**
     * Relación con el modelo Student.
     */
    public function student()
    {
        return $this->belongsTo(student::class);
    }
}
