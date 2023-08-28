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
        Schema::create('recibo_cajas', function (Blueprint $table) {
            $table->increments('recibo_caja');
            $table->unsignedInteger('reserva_id');
            $table->foreign('reserva_id')->references('reserva_cod')->on('reservas');
            $table->bigInteger('recibo_caja_subtotal');
            $table->float('recibo_caja_descuento');
            $table->bigInteger('recibo_caja_iva');
            $table->bigInteger('recibo_caja_total');
            $table->date('recibo_caja_fecha');
            $table->unsignedInteger('metodo_de_pago_id');
            $table->foreign('metodo_de_pago_id')->references('metodo_de_pago_cod')->on('metodo_de_pagos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recibos_cajas');
    }
};
