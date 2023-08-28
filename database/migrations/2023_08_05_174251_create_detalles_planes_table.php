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
        Schema::create('detalles_planes', function (Blueprint $table) {
            $table->increments('detalle_plan_cod');
            $table->unsignedInteger('plan_id');
            $table->foreign('plan_id')->references('plan_cod')->on('planes');
            $table->unsignedInteger('reserva_id');
            $table->foreign('reserva_id')->references('reserva_cod')->on('reservas');
            $table->bigInteger('detalle_plan_precio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_planes');
    }
};
