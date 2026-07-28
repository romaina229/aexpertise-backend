<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Créer l'utilisateur admin principal
        User::updateOrCreate(
            ['email' => 'admin@aexpertise.com'],
            [
                'name' => 'Administrateur',
                'email' => 'admin@aexpertise.com',
                'password' => Hash::make('Admin123!'),
                'email_verified_at' => now(),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        // Créer un utilisateur de test (optionnel)
        User::updateOrCreate(
            ['email' => 'test@aexpertise.com'],
            [
                'name' => 'Utilisateur Test',
                'email' => 'test@aexpertise.com',
                'password' => Hash::make('Test123!'),
                'email_verified_at' => now(),
                'role' => 'user',
                'is_active' => true,
            ]
        );
    }
}
