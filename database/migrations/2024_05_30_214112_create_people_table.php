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
            $table->string('tipo_persona')->nullable();
            $table->string('tipo_documento')->nullable();
            $table->string('documento_identidad')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('nombres')->nullable();
            $table->string('direccion')->nullable();
            $table->string('ubigeo')->nullable();
            $table->string('telefono')->nullable();
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
