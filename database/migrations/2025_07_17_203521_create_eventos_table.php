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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id('id_evento');
            $table->string('nombre_evento');
            $table->text('descripcion');
            $table->time('tipo_evento');
            $table->date('fecha_evento');
            $table->string('ubicacion');
            $table->decimal('precio', 10, 2);
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->foreignId('id_administrador')->constrained('administradores', 'id_administrador');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->dropForeign(['id_administrador']);
        });
        Schema::dropIfExists('eventos');
    }
};
