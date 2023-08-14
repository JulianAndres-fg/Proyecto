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
        Schema::create('servicios_planes', function (Blueprint $table) {
            $table->increments('servicio_plan_cod');
            $table->unsignedInteger('plan_id');
            $table->foreign('plan_id')->references('plan_cod')->on('planes');
            $table->unsignedInteger('servicio_id');
            $table->foreign('servicio_id')->references('servicio_cod')->on('servicios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios_planes');
    }
};
