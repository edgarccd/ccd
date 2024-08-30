<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('coordinadors', function (Blueprint $table) {
            $table->id();
            $table->Integer('carrera_id')->unique();
            $table->Integer('maestro_id')->unique();            
            $table->Integer('periodo_id')->unique();            
            $table->Integer('turno_id');
            $table->Integer('area_id');
            $table->timestamps();
        });        
    }

    public function down(): void
    {
        Schema::dropIfExists('coordinadors');
    }
};
