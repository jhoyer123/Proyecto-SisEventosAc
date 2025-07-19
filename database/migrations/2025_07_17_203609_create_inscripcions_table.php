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
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id('id_inscripcion'); // Si prefieres evitar compuestas
            $table->unsignedBigInteger('id_participante');
            $table->unsignedBigInteger('id_pago');
            $table->unsignedBigInteger('id_evento');
            $table->unique(['id_participante', 'id_pago', 'id_evento']); // evita duplicados
            $table->foreign('id_participante')->references('id_participante')->on('participantes');
            $table->foreign('id_pago')->references('id_pago')->on('pagos');
            $table->foreign('id_evento')->references('id_evento')->on('eventos');
            $table->date('fecha_inscripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
