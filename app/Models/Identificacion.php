<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identificacion extends Model
{
    // use HasFactory;
    protected $table='identificacion';
    public $timestamps=false;
    protected $fillable = [
        'id_lider_seguimiento',
        'id_municipio',
        'instancia_remite',
        'estado_referencia',
        'nombres',
        'apellidos',
        'id_tipo_documento',
        'doc_numero',
        'fecha_nacimiento',
        'edad',
        'telefono',
        'direccion',
        'barrio',
        'correo',
        'sexo',
        'id_orientacion',
        'id_identidad',
        'id_curso',
        'personas_vive',
        'area_ocurrencia',
        'regimen_salud',
        'eapb',
        'id_grupo_poblacional',
        'id_discapacidad',
        'semanas_gestacion',
        'lactante',
        'nacionalidad',
        'entrada_pais',
        'id_estatus_migratorio',
        'id_etnia',
        'id_user'
    ];
}
