<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambito extends Model
{
    // use HasFactory;
    protected $table='ambito';
    public $timestamps=false;
    protected $fillable = [
        'ambito'
    ];
}
