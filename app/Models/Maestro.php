<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Maestro extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nomina',             
        'persona_id',
        'activo', 
    ];

    public function persona():BelongsTo{
        return $this->belongsTo(Persona::class);
    }
        
    public function grupomateria(): HasMany{
        return $this->hasMany(GrupoMateria::class,'maestro_id');
    }

}
