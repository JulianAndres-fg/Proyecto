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
        Schema::create('permiso_roles', function (Blueprint $table) {
            $table->increments('permiso_rol_cod');
            $table->unsignedInteger('permiso_id');
            $table->foreign('permiso_id')->references('permiso_cod')->on('permisos');
            $table->unsignedInteger('rol_id');
            $table->foreign('rol_id')->references('rol_cod')->on('roles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permiso_roles');
    }
};
