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
            $table->string('usuario_id',20);
            $table->foreign('usuario_id')->references('usuario_cedula')->on('usuarios');
            $table->date('reserva_fech_registro');
            $table->float('reserva_subtotal');
            $table->float('reserva_descuento');
            $table->float('reserva_iva');
            $table->float('reserva_total');
            $table->string('cliente_id');
            $table->foreign('cliente_id')->references('cliente_cedula')->on('clientes');
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
