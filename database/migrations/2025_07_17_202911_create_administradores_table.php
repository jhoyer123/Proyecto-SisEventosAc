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
        Schema::create('administradores', function (Blueprint $table) {
            //$table->id();
            $table->unsignedBigInteger('id_administrador')->primary(); // PK
            $table->foreign('id_administrador')->references('id')->on('users'); // FK a users.id
            // Otros atributos específicos del administrador si los hay
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administradores');
    }
};
