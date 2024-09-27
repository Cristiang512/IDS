<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoViolencia extends Model
{
    // use HasFactory;
    protected $table='tipo_violencia';
    public $timestamps=false;
    protected $fillable = [
        'violencia'
    ];
}
