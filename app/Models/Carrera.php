<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'acronimo',
        'division_id', 
        'activo',      
    ];

    public function grupo(): HasMany{
        return $this->hasMany (Grupo::class,'carrera_id');
    }
    public function coordinador(): HasMany{
        return $this->hasMany (Coordinador::class,'carrera_id');
    }
}
