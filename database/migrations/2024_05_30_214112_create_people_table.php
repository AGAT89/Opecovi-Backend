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
        Schema::create('peoples', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_persona');
            $table->string('tipo_documento');
            $table->string('documento_identidad');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('nombres');
            $table->string('direccion');
            $table->string('ubigeo');
            $table->string('telefono');
            $table->enum('es_empleado', ['0','1'])->default('0');
            $table->enum('es_proveedor', ['0','1'])->default('0');
            $table->enum('es_activo', ['0','1'])->default('1');
            $table->enum('es_eliminado', ['0','1'])->default('0');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
