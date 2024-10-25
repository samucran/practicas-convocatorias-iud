<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locality extends Model
{
    use HasFactory;

    protected $table = 'localities'; // Nombre de la tabla

    protected $fillable = [
        'country',
        'state',
        'city',
        'neighborhood',
        'address',
        'additional_info',
    ];
}
