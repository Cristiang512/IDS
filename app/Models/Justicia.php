<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Justicia extends Model
{
    // use HasFactory;
    protected $table='justicia';
    public $timestamps=false;
    protected $fillable = [
        'conocimiento',
        'estado',
        'captura',
        'activacion',
        'proteccion',
        'caso_sit',
        'responsable',
        'informe',
        'observaciones',
        'evidencia',
        'id_informacion',
        'caso'
    ];
}
