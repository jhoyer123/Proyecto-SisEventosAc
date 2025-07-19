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
        Schema::create('recibes', function (Blueprint $table) {
            $table->id('id_recibe');
            $table->unsignedBigInteger('id_participante');
            $table->unsignedBigInteger('id_certificado');
            $table->unique(['id_participante', 'id_certificado']); // evita duplicados
            $table->foreign('id_participante')->references('id_participante')->on('participantes');
            $table->foreign('id_certificado')->references('id_certificado')->on('certificados');
            $table->date('fecha_entrega');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recibes');
    }
};
