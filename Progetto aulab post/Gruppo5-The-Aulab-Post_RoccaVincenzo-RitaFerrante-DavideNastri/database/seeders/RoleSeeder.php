<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@theaulabpost.it'],
            [
                'name' => 'Admin',
                'password' => Hash::make('12345678'),
                'is_admin' => true,
            ]
        );

        // Revisor user
        User::updateOrCreate(
            ['email' => 'revisor@theaulabpost.it'],
            [
                'name' => 'Revisore',
                'password' => Hash::make('12345678'),
                'is_revisor' => true,
            ]
        );

        // Writer user
        User::updateOrCreate(
            ['email' => 'writer@theaulabpost.it'],
            [
                'name' => 'Writer',
                'password' => Hash::make('12345678'),
                'is_writer' => true,
            ]
        );
    }
}