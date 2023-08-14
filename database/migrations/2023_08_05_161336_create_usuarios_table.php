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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('usuario_cedula',20)->primary();
            $table->string('usuario_nombre',50);
            $table->string('usuario_apellido',50);
            $table->string('usuario_correo',100)->unique();
            $table->string('usuario_celular',100)->unique();
            $table->string('usuario_direccion',100);
            $table->date('usuario_fech_nac');
            $table->string('usuario_sexo',20);
            $table->string('usuario_ciudad',50);
            $table->string('usuario_contraseña',50);
            $table->unsignedInteger('rol_id');
            $table->foreign('rol_id')->references('rol_cod')->on('roles');
            $table->char('usuario_estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
