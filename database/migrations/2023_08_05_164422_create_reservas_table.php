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
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('reserva_cod'); 
            $table->date('reserva_fech_ini');
            $table->date('reserva_fech_fin');
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('set null');
            $table->date('reserva_fech_registro');
            $table->bigInteger('reserva_subtotal');
            $table->float('reserva_descuento');
            $table->bigInteger('reserva_iva');
            $table->bigInteger('reserva_total');
            $table->unsignedInteger('domo_id')->nullable();
            $table->foreign('domo_id')->references('domo_cod')->on('domos')->onDelete('set null');
            $table->string('cliente_id')->nullable();
            $table->foreign('cliente_id')->references('cliente_cedula')->on('clientes')->onDelete('set null');
            $table->unsignedInteger('metodo_de_pago_id')->nullable();
            $table->foreign('metodo_de_pago_id')->references('metodo_de_pago_cod')->on('metodo_de_pagos')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
