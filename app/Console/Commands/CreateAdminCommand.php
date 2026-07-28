<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminCommand extends Command
{
    protected $signature = 'admin:create {email} {name} {password?}';
    protected $description = 'Créer un nouvel administrateur';

    public function handle()
    {
        $email = $this->argument('email');
        $name = $this->argument('name');
        $password = $this->argument('password') ?? 'Admin123!';

        if (User::where('email', $email)->exists()) {
            $this->error("L'utilisateur $email existe déjà !");
            return 1;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'admin',
            'is_active' => true,
        ]);

        $this->info('✅ Admin créé avec succès !');
        $this->info("📧 Email: $email");
        $this->info("🔑 Mot de passe: $password");
        
        return 0;
    }
}
