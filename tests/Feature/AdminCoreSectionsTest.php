<?php

namespace Tests\Feature;

use App\Models\About;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminCoreSectionsTest extends TestCase
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

    public function test_admin_login_redirects_to_dashboard(): void
    {
        $user = $this->adminUser();

        $response = $this->post('/admin/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect(route('admin.management.index'));
    }

    public function test_dashboard_shows_inicio_panel_by_default(): void
    {
        $user = $this->actingAsAdmin();
        About::factory()->create();
        Service::factory()->count(3)->create();

        $response = $this->get(route('admin.management.index'));

        $response->assertStatus(200);
        $response->assertSee('Welcome back, '.$user->name);
        $response->assertSee('Core Sections');
        $response->assertSee('Inicio');
        $response->assertSee('About Section');
        $response->assertSee('Service Pillars');
        $response->assertSee('Other Services');
    }

    public function test_about_index_shows_sidebar(): void
    {
        $this->actingAsAdmin();
        About::factory()->create();

        $response = $this->get(route('admin.about.index'));

        $response->assertStatus(200);
        $response->assertSee('Core Sections');
        $response->assertSee('Inicio');
        $response->assertSee('About Section');
    }

    public function test_about_edit_shows_sidebar(): void
    {
        $this->actingAsAdmin();
        $about = About::factory()->create();

        $response = $this->get(route('admin.about.edit'));

        $response->assertStatus(200);
        $response->assertSee('Core Sections');
        $response->assertSee('Inicio');
        $response->assertSee('About Section');
    }

    public function test_services_index_shows_sidebar(): void
    {
        $this->actingAsAdmin();
        Service::factory()->count(2)->create();

        $response = $this->get(route('admin.services.index'));

        $response->assertStatus(200);
        $response->assertSee('Core Sections');
        $response->assertSee('Inicio');
        $response->assertSee('Service Pillars');
    }

    public function test_services_create_shows_sidebar(): void
    {
        $this->actingAsAdmin();

        $response = $this->get(route('admin.services.create'));

        $response->assertStatus(200);
        $response->assertSee('Core Sections');
        $response->assertSee('Inicio');
        $response->assertSee('Service Pillars');
    }

    public function test_services_edit_shows_sidebar(): void
    {
        $this->actingAsAdmin();
        $service = Service::factory()->create();

        $response = $this->get(route('admin.services.edit', $service));

        $response->assertStatus(200);
        $response->assertSee('Core Sections');
        $response->assertSee('Inicio');
        $response->assertSee('Service Pillars');
    }
}
