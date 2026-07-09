<?php

namespace App\Models;

use App\Services\AdminMediaService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HeroSlide extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'badge',
        'title_line_1',
        'title_line_2',
        'description',
        'btn_primary_text',
        'btn_primary_url',
        'btn_secondary_text',
        'btn_secondary_url',
        'image_path',
        'sort_order',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image_path) {
            return null;
        }

        if (str_starts_with($this->image_path, 'http')) {
            return $this->image_path;
        }

        if (str_starts_with($this->image_path, 'img/')) {
            return asset($this->image_path);
        }

        return AdminMediaService::resolveImageUrl($this->image_path);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderBy('id');
    }
}
