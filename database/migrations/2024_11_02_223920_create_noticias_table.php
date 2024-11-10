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
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo'); // Título de la noticia
            $table->text('contenido'); // Contenido de la noticia
            $table->string('autor')->nullable(); // Autor de la noticia
            $table->text('imagen')->nullable(); // URL de la imagen
            $table->timestamp('fecha_publicacion')->nullable(); // Fecha de publicación
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
