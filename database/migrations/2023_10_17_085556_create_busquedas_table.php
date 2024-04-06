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
        Schema::create('busquedas', function (Blueprint $table) {
            $table->id();
            $table->string('dni');
            $table->string('apa');
            $table->string('ama');
            $table->string('nombres');
            $table->string('estado');
            $table->string('ubigeo');
            $table->string('restriccion');
            $table->binary('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('busquedas');
    }
};
