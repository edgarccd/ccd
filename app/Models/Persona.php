<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nombre',
        'apellido_pat', 
        'apellido_mat',
        'sexo',
        'correo',
        'direccion',
        'telefono',       
    ];

     public function alumno(): HasOne{

        return $this->hasOne(Alumno::class,'persona_id');
    }

    public function maestro(): HasOne{

        return $this->hasOne(Maestro::class,'persona_id');
    }

    public function user(): HasOne{

        return $this->hasOne(User::class,'persona_id');
    }

 
}
