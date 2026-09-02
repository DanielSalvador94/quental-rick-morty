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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            
            // Relación con el usuario autenticado
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Relación con el personaje sincronizado localmente
            $table->foreignId('character_id')
                ->constrained('characters')
                ->onDelete('cascade');

            $table->timestamps();

            //: Evita duplicados físicos de la relación
            $table->unique(['user_id', 'character_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
