<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoSemana extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia',
        'aula_id',
        'periodo_id',
        'turno_id',        
    ];
}
