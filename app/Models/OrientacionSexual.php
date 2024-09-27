<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrientacionSexual extends Model
{
    // use HasFactory;
    protected $table='orientacion_sexual';
    public $timestamps=false;
    protected $fillable = [
        'orientacion'
    ];
}
