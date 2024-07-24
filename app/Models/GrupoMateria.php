<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoMateria extends Model
{
    use HasFactory;
    protected $fillable = [
        'grupo_id',
        'materia_id',
        'maestro_id',               
    ];
}
