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
        Schema::create('planes_ofertas', function (Blueprint $table) {
            $table->increments('plan_oferta_cod');
            $table->date('plan_oferta_fech_ini');
            $table->date('plan_oferta_fech_fin');
            $table->unsignedInteger('plan_id');
            $table->foreign('plan_id')->references('plan_cod')->on('planes');
            $table->unsignedInteger('oferta_id');
            $table->foreign('oferta_id')->references('oferta_cod')->on('ofertas');
            $table->string('plan_oferta_nombre');
            $table->char('plan_oferta_estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planes_ofertas');
    }
};
