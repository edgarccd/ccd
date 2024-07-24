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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('grado');
            $table->string('grupo');
            $table->Integer('turno_id');
            $table->Integer('maestro_tutor_id');
            $table->Integer('maestro_eje_id');
            $table->Integer('periodo_id');
            $table->foreign('periodo_id')->references('id')->on('periodos');
            $table->Integer('carrera_id');  
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade')->onUpdate('cascade');          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
