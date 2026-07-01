<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceManagerFilterTest extends TestCase
{
    use RefreshDatabase;

    private function adminUser(): User
    {
        return User::factory()->admin()->create();
    }

    private function actingAsAdmin(): User
    {
        $user = $this->adminUser();
        $this->actingAs($user, 'web');

        return $user;
    }

    public function test_service_manager_filters_by_category(): void
    {
        $user = $this->actingAsAdmin();

        Service::factory()->create(['category' => 'manual_therapy', 'name_en' => 'Massage 1']);
        Service::factory()->create(['category' => 'manual_therapy', 'name_en' => 'Massage 2']);
        Service::factory()->create(['category' => 'medical_services', 'name_en' => 'Medical 1']);

        $response = $this->get(route('admin.services.index', ['filterCategory' => 'manual_therapy']));

        $response->assertStatus(200);
        $response->assertSee('Massage 1');
        $response->assertSee('Massage 2');
        $response->assertDontSee('Medical 1');
    }

    public function test_service_manager_shows_all_services_when_filter_is_all(): void
    {
        $user = $this->actingAsAdmin();

        Service::factory()->create(['category' => 'manual_therapy', 'name_en' => 'Massage 1']);
        Service::factory()->create(['category' => 'medical_services', 'name_en' => 'Medical 1']);

        $response = $this->get(route('admin.services.index'));

        $response->assertStatus(200);
        $response->assertSee('Massage 1');
        $response->assertSee('Medical 1');
    }
}
