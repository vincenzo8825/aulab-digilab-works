<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'user', 'description' => 'Utente standard']);
        Role::create(['name' => 'reviewer', 'description' => 'Revisore']);
        Role::create(['name' => 'admin', 'description' => 'Amministratore']);
    }
}
