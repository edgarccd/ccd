<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProyectoEquipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'comentarios',
        'proyecto_id',
        'grupo_id',
    ];

    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class,'proyecto_id');
    }

    public function grupo(): BelongsTo
    {
        return $this->belongsTo(Grupo::class,'grupo_id');
    }
    
    public function proyectoAlumno(): HasOne
    {
        return $this->hasOne(ProyectoAlumno::class, 'alumno_id');
    }
}
