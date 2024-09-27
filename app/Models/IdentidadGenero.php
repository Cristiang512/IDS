<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentidadGenero extends Model
{
    // use HasFactory;
    protected $table='identidad_genero';
    public $timestamps=false;
    protected $fillable = [
        'identidad'
    ];
}
