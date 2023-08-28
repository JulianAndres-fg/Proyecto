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
        Schema::create('planes', function (Blueprint $table) {
            $table->increments('plan_cod');
            $table->string('plan_nombre',50);
            $table->bigInteger('plan_precio');
            $table->unsignedInteger('domo_id');
            $table->foreign('domo_id')->references('domo_cod')->on('domos');
            $table->char('plan_estado');
            $table->text('plan_descripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planes');
    }
};
