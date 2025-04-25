<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Find or create admin user
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        
        // Find admin role
        $adminRole = Role::where('name', 'admin')->first();
        
        // Assign admin role if not already assigned
        if ($adminRole && !$adminUser->hasRole('admin')) {
            $adminUser->roles()->attach($adminRole);
        }
        
        // Output success message
        $this->command->info('Admin user created and role assigned!');
    }
}