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
        Schema::create('participantes', function (Blueprint $table) {
            //$table->id();
            //$table->timestamps();
            // Reemplaza $table->id(); con esto:
            $table->unsignedBigInteger('id_participante')->primary(); // Define id_participante como clave primaria
            // Y luego, define id_participante como clave foránea que referencia a id de la tabla 'users'
            // (que es tu tabla 'usuarios')
            $table->foreign('id_participante')->references('id')->on('users');
            $table->date('fecha_nac');// Agrega este campo según tu ERD
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participantes');
    }
};
