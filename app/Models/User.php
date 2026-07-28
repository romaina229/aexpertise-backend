<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active',
        'phone',
        'bio',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    // Vérifier si l'utilisateur est admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Vérifier si l'utilisateur est actif
    public function isActive(): bool
    {
        return $this->is_active;
    }

    // Relations
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    // Scope pour les admins
    public function scopeAdmins($query)
    {
        return $query->where('role', 'admin');
    }

    // Scope pour les utilisateurs actifs
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
