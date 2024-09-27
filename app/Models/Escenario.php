<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escenario extends Model
{
    // use HasFactory;
    protected $table='escenario';
    public $timestamps=false;
    protected $fillable = [
        'escenario'
    ];
}
