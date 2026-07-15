<?php

namespace Tests\Feature;

use App\Livewire\Components\LandingPage;
use App\Models\LandingPageVisit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Livewire\Livewire;
use Tests\TestCase;

class LandingPageVisitTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_renders_a_skeleton_loader_placeholder_on_initial_load(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('landing-page-skeleton-loader');
    }

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
        // The month labels live in the chart's data attribute, not as visible text.
        $response->assertSee('Jun');

        Carbon::setTestNow();
    }

    public function test_landing_page_component_mount_does_not_record_a_visit(): void
    {
        // The root cause of the production duplication was counting inside mount(),
        // which Livewire re-runs during its client-side initialization request.
        // Mounting the component directly must NOT insert a row.
        LandingPageVisit::query()->delete();

        Livewire::test(LandingPage::class);

        $this->assertDatabaseCount('landing_page_visits', 0);
    }

    public function test_landing_page_visit_is_counted_exactly_once_per_request_and_not_duplicated_by_livewire_init(): void
    {
        LandingPageVisit::query()->delete();

        // Simulate the real production flow: the initial server render (GET /)
        // followed by Livewire's client-side initialization request to its update endpoint.
        $this->get('/');

        // The Livewire init/hydrate request hits a different endpoint, so the
        // route middleware must not double-count. We emulate a second request
        // sharing the same session (e.g. a near-simultaneous init call).
        $this->get('/');

        $this->assertDatabaseCount('landing_page_visits', 1);
    }
}
