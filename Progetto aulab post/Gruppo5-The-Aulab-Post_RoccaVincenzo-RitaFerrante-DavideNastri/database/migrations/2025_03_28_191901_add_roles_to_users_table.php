<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'is_admin')) {
                $table->boolean('is_admin')->after('email')->nullable()->default(false);
            }
            if (!Schema::hasColumn('users', 'is_revisor')) {
                $table->boolean('is_revisor')->after('is_admin')->nullable()->default(false);
            }
            if (!Schema::hasColumn('users', 'is_writer')) {
                $table->boolean('is_writer')->after('is_revisor')->nullable()->default(false);
            }
        });

        // Verifica se l'utente admin esiste già
        if (!User::where('email', 'admin@theaulabpost.it')->exists()) {
            // Creazione dell'utente amministratore
            User::create([
                'name' => 'Admin',
                'email' => 'admin@theaulabpost.it',
                'password' => Hash::make('12345678'),
                'is_admin' => true,
            ]);
        }
    }

    public function down()
    {
        // Eliminazione dell'utente admin
        User::where('email', 'admin@theaulabpost.it')->delete();
        
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_admin', 'is_revisor', 'is_writer']);
        });
    }
};