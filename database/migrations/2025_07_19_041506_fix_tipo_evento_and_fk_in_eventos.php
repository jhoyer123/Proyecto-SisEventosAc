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
        Schema::table('eventos', function (Blueprint $table) {
            Schema::table('eventos', function (Blueprint $table) {
                // 1️⃣ Elimina la clave foránea existente primero:
                $table->dropForeign(['id_administrador']);

                // 2️⃣ Cambia el tipo de dato de tipo_evento de time a string:
                $table->string('tipo_evento')->change();

                // 3️⃣ Reaplica la clave foránea en id_administrador:
                $table->foreign('id_administrador')
                    ->references('id_administrador')
                    ->on('administradores')
                    ->cascadeOnDelete(); // o la acción que prefieras
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eventos', function (Blueprint $table) {
            Schema::table('eventos', function (Blueprint $table) {
                // Eliminar la FK para revertir:
                $table->dropForeign(['id_administrador']);

                // Volver tipo_evento a time (la definición que tenías antes):
                $table->time('tipo_evento')->change();

                // Recrear la FK original (sin cascade, o según como estaba antes):
                $table->foreign('id_administrador')
                    ->references('id')
                    ->on('administradores');
            });
        });
    }
};
