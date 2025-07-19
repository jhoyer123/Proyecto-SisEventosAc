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
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id('id_asignacion');
            $table->unsignedBigInteger('id_administrador');
            $table->unsignedBigInteger('id_expositor');
            $table->unsignedBigInteger('id_evento');
            $table->unique(['id_administrador', 'id_expositor', 'id_evento']); // evita duplicados
            $table->foreign('id_administrador')->references('id_administrador')->on('administradores');
            $table->foreign('id_expositor')->references('id_expositor')->on('expositores');
            $table->foreign('id_evento')->references('id_evento')->on('eventos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaciones');
    }
};
