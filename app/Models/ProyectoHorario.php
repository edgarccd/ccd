<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProyectoHorario extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia_id',
        'hora_id',
        'aula_id',
        'equipo_id',
        'periodo_id',
        'persona_id',
    ];

    public function proyectoSemana():BelongsTo{
        return $this->belongsTo(ProyectoSemana::class,'dia_id');
    }

    public function proyectoEquipo():BelongsTo{
        return $this->belongsTo(ProyectoEquipo::class,'equipo_id');
    }
}
