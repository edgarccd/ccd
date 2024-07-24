<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class GrupoAlumno extends Model
{
    use HasFactory;
    protected $fillable = [
        'alumno_id', 
        'grupo_id',       
    ];

    public function alumno():BelongsTo{
        return $this->belongsTo(Alumno::class);
    }

    
    public function grupo():BelongsTo{
        return $this->belongsTo(Grupo::class);
    }
    
}
