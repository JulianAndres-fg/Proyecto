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
        Schema::create('domo_caracteristicas', function (Blueprint $table) {
            $table->increments('domo_caracteristica_cod');
            $table->unsignedInteger('caracteristica_id');
            $table->foreign('caracteristica_id')->references('caracteristica_cod')->on('caracteristicas');
            $table->unsignedInteger('domo_id');
            $table->foreign('domo_id')->references('domo_cod')->on('domos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domo_caracteristicas');
    }
};
