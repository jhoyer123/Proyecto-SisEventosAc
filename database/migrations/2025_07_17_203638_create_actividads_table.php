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
        Schema::create('actividades', function (Blueprint $table) {
            $table->id('id_actividad');
            $table->string('nombre_actividad');
            $table->text('descripcion');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('tipo_actividad');
            $table->foreignId('id_evento')->constrained('eventos', 'id_evento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades');
    }
};
