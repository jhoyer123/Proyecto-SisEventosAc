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
        Schema::create('emites', function (Blueprint $table) {
            $table->id('id_emite');
            $table->unsignedBigInteger('id_evento');
            $table->unsignedBigInteger('id_certificado');
            $table->unique(['id_evento', 'id_certificado']); // evita duplicados
            $table->foreign('id_evento')->references('id_evento')->on('eventos');
            $table->foreign('id_certificado')->references('id_certificado')->on('certificados');
            $table->date('fecha_emision');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emites');
    }
};
