<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoPoblacional extends Model
{
    // use HasFactory;
    protected $table='grupo_poblacional';
    public $timestamps=false;
    protected $fillable = [
        'grupo_poblacional'
    ];
}
