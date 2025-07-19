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
        Schema::create('reg_asists', function (Blueprint $table) {
            $table->id('id_asists');
            $table->unsignedBigInteger('id_participante');
            $table->unsignedBigInteger('id_evento');
            $table->unsignedBigInteger('id_control');
            $table->unique(['id_participante', 'id_evento', 'id_control']); // evita duplicados
            $table->foreign('id_participante')->references('id_participante')->on('participantes');
            $table->foreign('id_evento')->references('id_evento')->on('eventos');
            $table->foreign('id_control')->references('id_control')->on('controles');
            $table->time('hora_ent');
            $table->time('hora_sal');
            $table->string('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reg_asists');
    }
};
