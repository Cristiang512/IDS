<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informacion extends Model
{
    // use HasFactory;
    protected $table='informacion';
    public $timestamps=false;
    protected $fillable = [
        'id_tipo_violencia',
        'id_actividad_vs',
        'sexo',
        'id_parentesco',
        'convive',
        'id_no_familiar',
        'id_mecanismo_agresion',
        'id_sitio_comprometido',
        'grado',
        'extension',
        'id_escenario',
        'id_ambito',
        'fecha_hecho',
        'contextualizacion',
        'id_identificacion',
    ];
}