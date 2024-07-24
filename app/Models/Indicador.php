<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'ponderacion',
        'criterio_id', 
        'cuestionario_id',
        'activo',      
    ];
}
