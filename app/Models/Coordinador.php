<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Coordinador extends Model
{
    use HasFactory;
    protected $fillable = [
        'carrera_id',
        'maestro_id',
        'periodo_id',
        'turno_id',  
        'area_id',    
    ];


    public function maestro():BelongsTo{
        return $this->belongsTo(Maestro::class);
    }

    public function carrera():BelongsTo{
        return $this->belongsTo(Carrera::class);
    }
    
}
