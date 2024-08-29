<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProyectoAlumno extends Model
{
    use HasFactory;
    protected $fillable = [
        'equipo_id',
        'alumno_id',
    ];

    public function alumno():BelongsTo{
        return $this->belongsTo(Alumno::class,'alumno_id');
    }

    
    public function equipo():BelongsTo{
        return $this->belongsTo(ProyectoEquipo::class);
    }
}
