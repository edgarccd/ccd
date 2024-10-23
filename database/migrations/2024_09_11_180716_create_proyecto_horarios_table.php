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
        Schema::create('proyecto_horarios', function (Blueprint $table) {
            $table->id();
            $table->Integer('dia_id')->unique(); 
            $table->Integer('hora_id')->unique(); 
            $table->Integer('equipo_id')->unique(); 
            $table->Integer('periodo_id')->unique(); 
            $table->Integer('persona_id')->unique(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecto_horarios');
    }
};
