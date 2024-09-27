<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadVS extends Model
{
    // use HasFactory;
    protected $table='actividad_vs';
    public $timestamps=false;
    protected $fillable = [
        'actividad'
    ];
}
