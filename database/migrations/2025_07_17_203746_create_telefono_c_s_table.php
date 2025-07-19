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
        Schema::create('telefono_c_s', function (Blueprint $table) {
            $table->id('id_telefono_c');
            $table->string('fono');

            // Clave foránea a Participante
            $table->foreignId('id_control')->constrained('controles', 'id_control');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telefono_c_s');
    }
};
