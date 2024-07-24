<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grupo extends Model
{
    use HasFactory;
    protected $fillable = [
        'grado',
        'grupo', 
        'turno_id',
        'maestro_tutor_id',
        'maestro_eje_id',
        'periodo_id',
        'carrera_id',       
    ];

    public function grupoalumno(): HasOne{
        return $this->hasOne(GrupoAlumno::class,'grupo_id');
    }

    public function carrera():BelongsTo{
        return $this->belongsTo(Carrera::class,'carrera_id');
    }
    
}
