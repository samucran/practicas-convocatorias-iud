<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modality extends Model
{
    use HasFactory;

    protected $table = 'modalities';

    protected $fillable = ['modality_name'];
}
