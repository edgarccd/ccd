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
        Schema::create('proyecto_semanas', function (Blueprint $table) {
            $table->id();
            $table->date('dia');
            $table->Integer('aula_id')->unique();
            $table->Integer('periodo_id')->unique();
            $table->Integer('turno_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecto_semanas');
    }
};
