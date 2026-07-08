<?php

namespace Tests\Feature;

use App\Models\DayDiscountSetting;
use App\Models\Package;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageDiscountDisplayTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_shows_discounted_prices_when_a_day_discount_is_active(): void
    {
        Carbon::setTestNow('2026-07-05'); // Sunday

        DayDiscountSetting::factory()->sunday(50)->create();
        Package::factory()->create(['price' => 100.00, 'active_status' => true, 'discount_eligible' => true]);
        Service::factory()->create(['price' => 80.00, 'category' => 'iv_therapy', 'active_status' => true, 'discount_eligible' => true]);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('$100.00');
        $response->assertSee('$80.00');
        $response->assertSee('Pay 50% today: $50.00');
        $response->assertSee('Pay 50% today: $40.00');
    }

    public function test_landing_page_shows_regular_prices_when_no_day_discount_is_active(): void
    {
        Carbon::setTestNow('2026-07-06'); // Monday

        DayDiscountSetting::query()->updateOrCreate(
            ['day_of_week' => 0],
            ['percentage' => 50, 'active_status' => false]
        );

        Package::factory()->create(['price' => 120.00, 'active_status' => true, 'discount_eligible' => false]);
        Service::factory()->create(['price' => 90.00, 'category' => 'iv_therapy', 'active_status' => true, 'discount_eligible' => false]);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('$120.00');
        $response->assertSee('$90.00');
        $response->assertDontSee('50% off today');
    }
}
