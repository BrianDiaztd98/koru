<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value'];

    public $timestamps = true;

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget(self::cacheKey()));
        static::deleted(fn () => Cache::forget(self::cacheKey()));
    }

    public static function cacheKey(): string
    {
        return 'site_settings.all';
    }

    public static function allSettings(): array
    {
        return Cache::remember(self::cacheKey(), 3600, fn () => self::query()->pluck('value', 'key')->all());
    }

    public static function getValue(string $key, mixed $default = null): mixed
    {
        return self::allSettings()[$key] ?? $default;
    }
}
