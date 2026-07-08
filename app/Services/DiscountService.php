<?php

namespace App\Services;

use App\Models\DayDiscountSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

/**
 * Calcula y aplica el descuento por día de la semana a cualquier elemento con precio.
 *
 * El porcentaje es configurable por día desde el panel administrativo
 * (App\Models\DayDiscountSetting). Por defecto los domingos aplican 50 %.
 */
class DiscountService
{
    /** @var int Default discount percentage applied on Sundays. */
    public const DEFAULT_SUNDAY_PERCENTAGE = 50;

    /** @var string Cache key for the active day discount map. */
    private const CACHE_KEY = DayDiscountSetting::CACHE_KEY;

    /**
     * Devuelve el porcentaje de descuento configurado para un día dado.
     *
     * @param  Carbon|null  $day  Día a evaluar. Si es null se usa hoy.
     */
    public function percentageForDay(?Carbon $day = null): float
    {
        $day ??= now();
        $dayOfWeek = $day->dayOfWeek;

        return (float) ($this->activeMap()[$dayOfWeek] ?? 0);
    }

    /**
     * Indica si existe un descuento activo para el día indicado.
     *
     * @param  Carbon|null  $day  Día a evaluar. Si es null se usa hoy.
     */
    public function hasDiscount(?Carbon $day = null): bool
    {
        return $this->percentageForDay($day) > 0;
    }

    /**
     * Aplica el descuento del día a un precio y devuelve el monto final.
     *
     * @param  float|string|null  $price  Precio original del elemento.
     * @param  Carbon|null  $day  Día a evaluar. Si es null se usa hoy.
     */
    public function applyToPrice(float|string|null $price, $eligibleOrDay = true, ?Carbon $day = null): float
    {
        $price = (float) ($price ?? 0);

        // Backwards-compatible argument order: some calls previously passed a Carbon day as the
        // second argument. Detect and normalize into ($eligible, $day).
        if ($eligibleOrDay instanceof Carbon) {
            $day = $eligibleOrDay;
            $eligible = true;
        } else {
            $eligible = (bool) $eligibleOrDay;
        }

        if ($price <= 0 || ! $eligible) {
            return round($price, 2);
        }

        $percentage = $this->percentageForDay($day);

        if ($percentage <= 0) {
            return round($price, 2);
        }

        $discounted = $price * (1 - min($percentage, 100) / 100);

        return round($discounted, 2);
    }

    /**
     * Devuelve únicamente el monto descontado (no el precio final).
     *
     * @param  float|string|null  $price  Precio original del elemento.
     * @param  Carbon|null  $day  Día a evaluar. Si es null se usa hoy.
     */
    public function discountAmount(float|string|null $price, $eligibleOrDay = true, ?Carbon $day = null): float
    {
        $price = (float) ($price ?? 0);

        if ($eligibleOrDay instanceof Carbon) {
            $day = $eligibleOrDay;
            $eligible = true;
        } else {
            $eligible = (bool) $eligibleOrDay;
        }

        $percentage = $eligible ? $this->percentageForDay($day) : 0;

        if ($price <= 0 || $percentage <= 0) {
            return 0.0;
        }

        return round($price * min($percentage, 100) / 100, 2);
    }

    /**
     * Mapa en caché de day_of_week => percentage para días activos.
     *
     * @return array<int, float>
     */
    public function activeMap(): array
    {
        /** @var array<int, float> $map */
        $map = Cache::remember(self::CACHE_KEY, 3600, function (): array {
            return DayDiscountSetting::query()
                ->where('active_status', true)
                ->pluck('percentage', 'day_of_week')
                ->map(fn ($value) => (float) $value)
                ->all();
        });

        return $map;
    }

    /**
     * Invalida la caché del mapa de descuentos.
     */
    public function forgetCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}
