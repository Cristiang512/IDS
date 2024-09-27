<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proteccion extends Model
{
    // use HasFactory;
    protected $table='proteccion';
    public $timestamps=false;
    protected $fillable = [
        'adopto',
        'medida',
        'formulacion',
        'observaciones',
        'id_informacion',
        'evidencia',
        'caso'
    ];
}
