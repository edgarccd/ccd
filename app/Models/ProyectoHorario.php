<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoHorario extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia_id',
        'hora_id',
        'equipo_id',
    ];

}
