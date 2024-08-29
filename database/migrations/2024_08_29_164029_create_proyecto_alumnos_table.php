<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proyecto_alumnos', function (Blueprint $table) {
            $table->id();
            $table->Integer('equipo_id')->unique();
            $table->foreign('equipo_id')->references('id')->on('proyecto_equipos')->onDelete('cascade')->onUpdate('cascade');
            $table->Integer('alumno_id')->unique();
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecto_alumnos');
    }
};
