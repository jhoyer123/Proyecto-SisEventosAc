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
        Schema::table('reg_asists', function (Blueprint $table) {
            $table->time('hora_ent')->nullable()->change();
            $table->time('hora_sal')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reg_asists', function (Blueprint $table) {
            $table->time('hora_ent')->nullable(false)->change();
            $table->time('hora_sal')->nullable(false)->change();
        });
    }
};
