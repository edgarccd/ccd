<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Alumno extends Model
{
    use HasFactory;
    protected $fillable = [
        'matricula',
        'persona_id', 
        'status_id',      
    ];

    public function persona():BelongsTo{
        return $this->belongsTo(Persona::class);
    }
    
    public function grupoalumno(): HasOne{
        return $this->hasOne(GrupoAlumno::class,'alumno_id');
    }
}
