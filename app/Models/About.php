<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

use App\Services\AdminMediaService;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'philosophy',
        'vision',
        'feature_1_title',
        'feature_1_description',
        'feature_2_title',
        'feature_2_description',
        'image_1',
        'image_2',
        'image_3',
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
        return self::query()->first()?->toArray() ?? [];
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
}
