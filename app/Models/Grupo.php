<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $fillable = [
        'grado',
        'grupo', 
        'turno_id',
        'maestro_id',
        'maestro_eje_id',
        'periodo_id',
        'carrera_id',       
    ];
}
