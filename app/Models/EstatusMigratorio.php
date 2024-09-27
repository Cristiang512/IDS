<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatusMigratorio extends Model
{
    // use HasFactory;
    protected $table='estatus_migratorio';
    public $timestamps=false;
    protected $fillable = [
        'estatus'
    ];
}
