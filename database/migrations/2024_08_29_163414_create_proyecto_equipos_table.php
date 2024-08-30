<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('proyecto_equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('comentarios');
            $table->Integer('proyecto_id')->unique();           
            $table->Integer('grupo_id')->unique();           
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('proyecto_equipos');
    }
};
