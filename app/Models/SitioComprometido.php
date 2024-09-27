<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitioComprometido extends Model
{
    // use HasFactory;
    protected $table='sitio_comprometido';
    public $timestamps=false;
    protected $fillable = [
        'sitio_comprometido'
    ];
}
