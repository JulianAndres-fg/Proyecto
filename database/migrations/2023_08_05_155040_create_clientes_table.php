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
        Schema::create('clientes', function (Blueprint $table) {
            $table->string('cliente_cedula')->primary();
            $table->string('cliente_nombre',50);
            $table->string('cliente_apellido',50);
            $table->string('cliente_correo',100)->unique();
            $table->string('cliente_celular',20);
            $table->date('cliente_fech_nac')->nullable();
            $table->string('cliente_ciudad',20);
            $table->string('cliente_direccion',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
