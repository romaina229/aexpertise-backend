<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'category',
        'file_url',
        'video_url',
        'thumbnail',
        'views',
        'downloads',
        'is_active',
        'is_featured',
        'published_at',
        'tags',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
        'tags' => 'array',
    ];

    // Accesseurs
    public function getTypeLabelAttribute()
    {
        $labels = [
            'article' => 'Article',
            'video' => 'Vidéo',
            'ebook' => 'E-book',
            'document' => 'Document',
        ];
        return $labels[$this->type] ?? $this->type;
    }

    public function getTypeColorAttribute()
    {
        $colors = [
            'article' => 'bg-blue-100 text-blue-700',
            'video' => 'bg-red-100 text-red-700',
            'ebook' => 'bg-purple-100 text-purple-700',
            'document' => 'bg-green-100 text-green-700',
        ];
        return $colors[$this->type] ?? 'bg-gray-100 text-gray-700';
    }

    public function getTypeIconAttribute()
    {
        $icons = [
            'article' => 'FileText',
            'video' => 'Video',
            'ebook' => 'Book',
            'document' => 'FileIcon',
        ];
        return $icons[$this->type] ?? 'FileText';
    }

    // Méthodes
    public function incrementViews()
    {
        $this->increment('views');
    }

    public function incrementDownloads()
    {
        $this->increment('downloads');
    }

    // Scopes
    public function scopeActive(Builder $query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured(Builder $query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByType(Builder $query, string $type)
    {
        return $query->where('type', $type);
    }

    public function scopeByCategory(Builder $query, string $category)
    {
        return $query->where('category', $category);
    }
}