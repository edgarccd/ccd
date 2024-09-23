<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoEntregable extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'periodo_id',
        'equipo_id',
        'grupo_id',
        'persona_id',       
    ];
}
