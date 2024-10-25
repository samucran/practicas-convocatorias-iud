<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agency extends Model
{
    use HasFactory;

    protected $table = 'agencies';

    protected $fillable = [
        'agency_name',
        'contact_name',
        'contact_email',
        'contact_phone',
        'contact_role',
    ];
}
