<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class LandingPageVisit extends Model
{
    protected $guarded = [];

    public function scopeForYear(Builder $query, ?int $year = null): Builder
    {
        $year ??= now()->year;

        return $query->whereYear('created_at', $year);
    }

    public function scopeMonthlyStats(Builder $query, ?int $year = null): Collection
    {
        $year ??= now()->year;

        $visits = $query->forYear($year)
            ->select('created_at')
            ->get();

        return collect(range(1, 12))->map(function (int $month) use ($visits): array {
            $count = $visits->filter(fn (self $visit) => $visit->created_at instanceof Carbon
                ? $visit->created_at->month === $month
                : Carbon::parse($visit->created_at)->month === $month)
                ->count();

            return [
                'month' => $month,
                'label' => now()->month($month)->format('M'),
                'visits' => $count,
            ];
        });
    }

    public static function totalVisitsForYear(?int $year = null): int
    {
        return static::query()->forYear($year)->count();
    }

    public static function availableYears(): Collection
    {
        return static::query()
            ->select('created_at')
            ->get()
            ->pluck('created_at')
            ->map(fn ($createdAt) => $createdAt instanceof Carbon
                ? $createdAt->year
                : Carbon::parse($createdAt)->year)
            ->unique()
            ->sort()
            ->values();
    }
}
