<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoFamiliar extends Model
{
    // use HasFactory;
    protected $table='no_familiar';
    public $timestamps=false;
    protected $fillable = [
        'no_familiar'
    ];
}
