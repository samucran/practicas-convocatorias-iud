<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class identity extends Model
{
    use HasFactory;

    protected $table = 'identities';

    protected $fillable = ['identity_type'];
}
