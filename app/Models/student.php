<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'second_name',
        'first_surname',
        'second_surname',
        'identity_id',
        'identity_number',
        'institutional_email',
        'personal_email',
        'phone_number',
        'locality_id',
        'program_id',
        'file_id',
        'quialification',
        'status',
    ];

    public function identity()
    {
        return $this->belongsTo(Identity::class);
    }

    // Relación con localidad
    public function locality()
    {
        return $this->belongsTo(Locality::class);
    }

    // Relación con programa
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    // Relación con archivo
    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
