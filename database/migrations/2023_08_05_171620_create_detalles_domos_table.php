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
        Schema::create('detalles_domos', function (Blueprint $table) {
            $table->increments('detalle_domo_cod');
            $table->unsignedInteger('domo_id');
            $table->foreign('domo_id')->references('domo_cod')->on('domos');
            $table->unsignedInteger('reserva_id');
            $table->foreign('reserva_id')->references('reserva_cod')->on('reservas');
            $table->text('detalle_domo_descripcion');
            $table->bigInteger('detalle_domo_precio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_domos');
    }
};
