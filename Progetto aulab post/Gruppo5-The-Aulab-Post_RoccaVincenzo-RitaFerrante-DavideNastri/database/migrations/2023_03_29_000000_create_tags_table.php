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
        if (!Schema::hasTable('tags')) {
            Schema::create('tags', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->string('slug')->unique();
                $table->timestamps();
            });
        } else {
            if (!Schema::hasColumn('tags', 'slug')) {
                Schema::table('tags', function (Blueprint $table) {
                    $table->string('slug')->unique()->after('name');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('tags')) {
            if (Schema::hasColumn('tags', 'slug')) {
                Schema::table('tags', function (Blueprint $table) {
                    $table->dropColumn('slug');
                });
            }
        } else {
            Schema::dropIfExists('tags');
        }
    }
};