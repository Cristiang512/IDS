<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoVida extends Model
{
    // use HasFactory;
    protected $table='curso_vida';
    public $timestamps=false;
    protected $fillable = [
        'curso_vida'
    ];
}
