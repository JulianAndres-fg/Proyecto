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
        Schema::create('recomendaciones', function (Blueprint $table) {
            $table->increments('recomendacion_cod');
            $table->text('recomendacion_descripcion');
            $table->unsignedInteger('reserva_id');
            $table->foreign('reserva_id')->references('reserva_cod')->on('reservas');
            $table->string('recomendacion_puntaje',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recomendaciones');
    }
};
