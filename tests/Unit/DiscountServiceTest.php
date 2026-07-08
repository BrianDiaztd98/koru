<?php

namespace Tests\Unit;

use App\Models\DayDiscountSetting;
use App\Services\DiscountService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class DiscountServiceTest extends TestCase
{
    use RefreshDatabase;

    private DiscountService $service;

    protected function setUp(): void
    {
        parent::setUp();

        Cache::forget(DayDiscountSetting::CACHE_KEY);

        $this->service = new DiscountService;
    }

    public function test_no_discount_returns_full_price(): void
    {
        $monday = Carbon::parse('2026-07-06'); // Monday

        $this->assertFalse($this->service->hasDiscount($monday));
        $this->assertSame(0.0, $this->service->percentageForDay($monday));
        $this->assertSame(100.0, $this->service->applyToPrice(100, $monday));
        $this->assertSame(0.0, $this->service->discountAmount(100, $monday));
    }

    public function test_sunday_applies_fifty_percent_discount_by_default(): void
    {
        DayDiscountSetting::factory()->sunday(50)->create();

        $sunday = Carbon::parse('2026-07-05'); // Sunday

        $this->assertTrue($this->service->hasDiscount($sunday));
        $this->assertSame(50.0, $this->service->percentageForDay($sunday));
        $this->assertSame(50.0, $this->service->applyToPrice(100, $sunday));
        $this->assertSame(50.0, $this->service->discountAmount(100, $sunday));
    }

    public function test_configurable_percentage_applies_to_any_day(): void
    {
        DayDiscountSetting::query()->updateOrCreate(
            ['day_of_week' => 1],
            ['percentage' => 20, 'active_status' => true]
        );

        $monday = Carbon::parse('2026-07-06'); // Monday

        $this->assertSame(20.0, $this->service->percentageForDay($monday));
        $this->assertSame(80.0, $this->service->applyToPrice(100, $monday));
        $this->assertSame(20.0, $this->service->discountAmount(100, $monday));
    }

    public function test_inactive_day_setting_is_ignored(): void
    {
        DayDiscountSetting::query()->updateOrCreate(
            ['day_of_week' => 0],
            ['percentage' => 50, 'active_status' => false]
        );

        $sunday = Carbon::parse('2026-07-05');

        $this->assertFalse($this->service->hasDiscount($sunday));
        $this->assertSame(0.0, $this->service->percentageForDay($sunday));
        $this->assertSame(100.0, $this->service->applyToPrice(100, $sunday));
    }

    public function test_zero_price_returns_zero(): void
    {
        DayDiscountSetting::factory()->sunday(50)->create();

        $sunday = Carbon::parse('2026-07-05');

        $this->assertSame(0.0, $this->service->applyToPrice(0, $sunday));
        $this->assertSame(0.0, $this->service->discountAmount(0, $sunday));
    }

    public function test_percentage_is_capped_at_one_hundred(): void
    {
        DayDiscountSetting::query()->updateOrCreate(
            ['day_of_week' => 2],
            ['percentage' => 150, 'active_status' => true]
        );

        $tuesday = Carbon::parse('2026-07-07');

        $this->assertSame(0.0, $this->service->applyToPrice(100, $tuesday));
    }

    public function test_uses_today_when_no_day_provided(): void
    {
        Carbon::setTestNow('2026-07-05'); // Sunday

        DayDiscountSetting::factory()->sunday(50)->create();

        $this->assertSame(50.0, $this->service->percentageForDay());
        $this->assertSame(100.0, $this->service->applyToPrice(200));
    }
}
