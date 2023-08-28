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
        Schema::create('domos', function (Blueprint $table) {
            $table->increments('domo_cod',50);
            $table->string('domo_nombre');
            $table->char('domo_estado');
            $table->bigInteger('domo_precio');
            $table->string('domo_ubicacion',50);
            $table->text('domo_descripcion');
            $table->string('domo_capacidad',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domos');
    }
};
