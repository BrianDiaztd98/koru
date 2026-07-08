<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class DayDiscountSetting extends Model
{
    use HasFactory;

    public const CACHE_KEY = 'day_discount_settings.map';

    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget(self::CACHE_KEY));
        static::deleted(fn () => Cache::forget(self::CACHE_KEY));
    }

    /**
     * Carbon dayOfWeek convention: 0 = Sunday ... 6 = Saturday.
     *
     * @var array<int, string>
     */
    public const DAYS = [
        0 => 'sunday',
        1 => 'monday',
        2 => 'tuesday',
        3 => 'wednesday',
        4 => 'thursday',
        5 => 'friday',
        6 => 'saturday',
    ];

    /**
     * Human-readable labels per day (es).
     *
     * @var array<int, string>
     */
    public const DAY_LABELS_ES = [
        0 => 'Domingo',
        1 => 'Lunes',
        2 => 'Martes',
        3 => 'Miércoles',
        4 => 'Jueves',
        5 => 'Viernes',
        6 => 'Sábado',
    ];

    protected $fillable = [
        'day_of_week',
        'percentage',
        'active_status',
    ];

    protected $casts = [
        'day_of_week' => 'integer',
        'percentage' => 'decimal:2',
        'active_status' => 'boolean',
    ];

    /**
     * @return array<int, string>
     */
    public static function days(): array
    {
        return self::DAYS;
    }

    /**
     * @return array<int, string>
     */
    public static function dayLabelsEs(): array
    {
        return self::DAY_LABELS_ES;
    }

    public function getDayLabelEsAttribute(): string
    {
        return self::DAY_LABELS_ES[$this->day_of_week] ?? (self::DAYS[$this->day_of_week] ?? (string) $this->day_of_week);
    }

    public function getDayKeyAttribute(): string
    {
        return self::DAYS[$this->day_of_week] ?? (string) $this->day_of_week;
    }
}
