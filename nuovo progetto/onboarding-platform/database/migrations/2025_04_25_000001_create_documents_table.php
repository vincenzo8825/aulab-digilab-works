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
        // Verifica se la tabella esiste già prima di crearla
        if (!Schema::hasTable('documents')) {
            Schema::create('documents', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description')->nullable();
                $table->string('category');
                $table->string('file_path');
                $table->foreignId('uploaded_by')->constrained('users');
                $table->boolean('is_required')->default(false);
                $table->enum('visibility', ['all', 'admin', 'specific_departments'])->default('all');
                $table->timestamps();
            });
        } else {
            // Se la tabella esiste già, aggiungiamo solo i campi mancanti
            Schema::table('documents', function (Blueprint $table) {
                if (!Schema::hasColumn('documents', 'category')) {
                    $table->string('category')->nullable()->after('description');
                }
                
                if (!Schema::hasColumn('documents', 'is_required')) {
                    $table->boolean('is_required')->default(false)->after('file_size');
                }
                
                if (!Schema::hasColumn('documents', 'uploaded_by') && !Schema::hasColumn('documents', 'uploaded_by')) {
                    $table->foreignId('uploaded_by')->nullable()->constrained('users')->after('file_size');
                }
            });
        }

        // Creiamo la tabella document_views solo se non esiste
        if (!Schema::hasTable('document_views')) {
            Schema::create('document_views', function (Blueprint $table) {
                $table->id();
                $table->foreignId('document_id')->constrained()->onDelete('cascade');
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->timestamp('viewed_at');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_views');
        // Non eliminiamo la tabella documents nel down perché potrebbe essere stata creata dalla prima migrazione
        // Schema::dropIfExists('documents');
    }
};