<?php

namespace App\Models;

use App\Services\AdminMediaService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'philosophy',
        'vision',
        'mission',
        'feature_1_title',
        'feature_1_description',
        'feature_2_title',
        'feature_2_description',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget(self::cacheKey()));
        static::deleted(fn () => Cache::forget(self::cacheKey()));
    }

    public static function cacheKey(): string
    {
        return 'about.content';
    }

    public static function getAboutData(): array
    {
        $about = self::query()->with('glanceItems')->first();

        if (! $about) {
            return [];
        }

        $data = $about->toArray();
        $data['glance_items'] = $about->glanceItems
            ->sortBy('order')
            ->map(fn (AboutGlanceItem $item) => [
                'title' => $item->title,
                'description' => $item->description,
            ])
            ->values()
            ->toArray();

        return $data;
    }

    public function getImage1UrlAttribute(): ?string
    {
        return AdminMediaService::resolveImageUrl($this->image_1);
    }

    public function getImage2UrlAttribute(): ?string
    {
        return AdminMediaService::resolveImageUrl($this->image_2);
    }

    public function getImage3UrlAttribute(): ?string
    {
        return AdminMediaService::resolveImageUrl($this->image_3);
    }

    public function getImage4UrlAttribute(): ?string
    {
        return AdminMediaService::resolveImageUrl($this->image_4);
    }

    public function glanceItems(): HasMany
    {
        return $this->hasMany(AboutGlanceItem::class);
    }
}
