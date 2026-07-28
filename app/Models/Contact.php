<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'is_read',
        'is_archived',
        'replied_at',
        'replied_by',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'is_archived' => 'boolean',
        'replied_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relations
    public function repliedBy()
    {
        return $this->belongsTo(User::class, 'replied_by');
    }

    // Scopes
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    public function scopeArchived($query)
    {
        return $query->where('is_archived', true);
    }

    public function scopeNotArchived($query)
    {
        return $query->where('is_archived', false);
    }

    // Accesseurs
    public function getStatusAttribute()
    {
        if ($this->replied_at) {
            return 'Répondu';
        }
        if ($this->is_read) {
            return 'Lu';
        }
        return 'Non lu';
    }

    public function getStatusColorAttribute()
    {
        if ($this->replied_at) {
            return 'bg-green-100 text-green-700';
        }
        if ($this->is_read) {
            return 'bg-blue-100 text-blue-700';
        }
        return 'bg-red-100 text-red-700';
    }
}
