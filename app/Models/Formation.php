<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'duration',
        'price',
        'category',
        'level',
        'image',
        'is_active',
        'start_date',
        'end_date',
        'max_participants',
        'current_participants',
        'objectives',
        'program',
        'prerequisites'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean',
        // Assurer que objectives et program sont toujours des tableaux
        'objectives' => 'array',
        'program' => 'array'
    ];

    // Accesseurs pour garantir le format
    public function getObjectivesAttribute($value)
    {
        if (is_null($value)) {
            return [];
        }
        if (is_string($value)) {
            return json_decode($value, true) ?? [];
        }
        return $value;
    }

    public function getProgramAttribute($value)
    {
        if (is_null($value)) {
            return [];
        }
        if (is_string($value)) {
            return json_decode($value, true) ?? [];
        }
        return $value;
    }

    // Mutateurs pour assurer le bon format en DB
    public function setObjectivesAttribute($value)
    {
        $this->attributes['objectives'] = is_array($value) ? json_encode($value) : $value;
    }

    public function setProgramAttribute($value)
    {
        $this->attributes['program'] = is_array($value) ? json_encode($value) : $value;
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function isFull()
    {
        return $this->current_participants >= $this->max_participants;
    }

    public function availablePlaces()
    {
        return $this->max_participants - $this->current_participants;
    }
}
