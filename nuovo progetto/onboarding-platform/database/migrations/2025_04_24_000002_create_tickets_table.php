<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        // Verifica se la tabella esiste già prima di crearla
        if (!Schema::hasTable('tickets')) {
            Schema::create('tickets', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description');
                $table->enum('status', ['open', 'in_progress', 'resolved', 'closed'])->default('open');
                $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
                $table->string('category')->nullable();
                $table->foreignId('created_by')->constrained('users');
                $table->foreignId('assigned_to')->nullable()->constrained('users');
                $table->timestamp('closed_at')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        // Non eliminiamo la tabella nel down perché potrebbe essere stata creata dalla prima migrazione
        // Schema::dropIfExists('tickets');
    }
}