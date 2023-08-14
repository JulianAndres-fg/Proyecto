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
        Schema::create('detalles_servicios', function (Blueprint $table) {
            $table->increments('detalle_servicio_cod');
            $table->unsignedInteger('servicio_id');
            $table->foreign('servicio_id')->references('servicio_cod')->on('servicios');
            $table->unsignedInteger('reserva_id');
            $table->foreign('reserva_id')->references('reserva_cod')->on('reservas');
            $table->float('detalle_servicio_precio');
            $table->integer('detalle_servicio_cantidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_servicios');
    }
};
