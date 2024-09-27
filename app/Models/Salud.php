<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salud extends Model
{
    // use HasFactory;
    protected $table='salud';
    public $timestamps=false;
    protected $fillable = [
        'pro_vih',
        'pro_hepa',
        'pro_otras',
        'anticoncepcion',
        'orientacion',
        'salud_mental',
        'remision',
        'informe',
        'observaciones',
        'id_informacion',
        'evidencia',
        'caso'
    ];
}
