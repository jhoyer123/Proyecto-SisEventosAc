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
        Schema::create('telefono_p_s', function (Blueprint $table) {
            //$table->id();

            $table->id('id_telefono_p'); // PK

            $table->string('fono');

            // Clave foránea a Participante
            $table->foreignId('id_participante')->constrained('participantes', 'id_participante');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telefono_p_s');
    }
};
