<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MecanismoAgresion extends Model
{
    // use HasFactory;
    protected $table='mecanismo_agresion';
    public $timestamps=false;
    protected $fillable = [
        'mecanismo'
    ];
}
