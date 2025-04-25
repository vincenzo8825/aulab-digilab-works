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
        if (!Schema::hasTable('article_tag')) {
            Schema::create('article_tag', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('article_id');
                $table->unsignedBigInteger('tag_id');
                $table->timestamps();

                $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
                $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
                
                $table->unique(['article_id', 'tag_id']);
            });
        } else {
            // Verifica se mancano le chiavi esterne
            Schema::table('article_tag', function (Blueprint $table) {
                // Verifica se esistono già le chiavi esterne prima di aggiungerle
                if (!Schema::hasColumn('article_tag', 'article_id')) {
                    $table->unsignedBigInteger('article_id');
                    $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
                }
                
                if (!Schema::hasColumn('article_tag', 'tag_id')) {
                    $table->unsignedBigInteger('tag_id');
                    $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
                }
                
                // Aggiungi l'indice unico se non esiste già
                // Nota: questo potrebbe generare un errore se l'indice esiste già con un nome diverso
                try {
                    $table->unique(['article_id', 'tag_id']);
                } catch (\Exception $e) {
                    // L'indice potrebbe già esistere, ignora l'errore
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_tag');
    }
};