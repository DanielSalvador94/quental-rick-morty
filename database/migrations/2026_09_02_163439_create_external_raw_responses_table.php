<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('external_raw_responses', function (Blueprint $table) {
            $table->id();
            $table->string('resource_type'); // 'character', 'location', 'episode'
            $table->integer('page_number');
            $table->json('payload'); // Guardamos el JSON sin parsear
            $table->timestamps();

            // Evitamos la duplicidad de payloads por tipo de recurso y página
            $table->unique(['resource_type', 'page_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('external_raw_responses');
    }
};
