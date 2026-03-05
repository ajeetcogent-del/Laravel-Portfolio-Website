<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'problem',
        'solution',
        'technologies',
        'github_link',
        'demo_link',
        'image',
        'screenshots',
        'features',
        'results',
        'featured',
        'order',
    ];

    protected $casts = [
        'screenshots' => 'array',
        'features'    => 'array',
        'results'     => 'array',
        'featured'    => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function getTechnologiesArrayAttribute(): array
    {
        return array_map('trim', explode(',', $this->technologies ?? ''));
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('created_at', 'desc');
    }
}
