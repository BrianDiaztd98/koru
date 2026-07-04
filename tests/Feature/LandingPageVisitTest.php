<?php

namespace Tests\Feature;

use App\Models\LandingPageVisit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class LandingPageVisitTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_visits_are_tracked_once_per_session_and_rendered_in_management_dashboard(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        LandingPageVisit::query()->delete();

        Carbon::setTestNow(Carbon::create(2026, 6, 10, 12, 0, 0));
        $this->get('/');

        Carbon::setTestNow(Carbon::create(2026, 7, 10, 12, 0, 0));
        $this->get('/');

        Carbon::setTestNow(Carbon::create(2025, 12, 10, 12, 0, 0));
        $this->get('/');

        $this->assertDatabaseCount('landing_page_visits', 1);

        $response = $this->actingAs($admin)->get('/admin/management?year=2026');

        $response->assertOk();
        $response->assertSeeText('Landing Page Visits');
        $response->assertSeeText('1');
        $response->assertSeeText('Jun');

        Carbon::setTestNow();
    }
}
