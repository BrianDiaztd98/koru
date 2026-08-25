<?php

namespace Tests\Feature;

use App\Livewire\Admin\AboutPageManager\AboutPageManager;
use App\Models\About;
use App\Models\AboutGlanceItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AboutPageTest extends TestCase
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

    public function test_about_page_loads_existing_data(): void
    {
        $user = $this->actingAsAdmin();

        $about = About::factory()->create([
            'title' => 'Test Title',
            'subtitle' => 'Test Subtitle',
            'description' => 'Test Description',
            'philosophy' => 'Test Philosophy',
            'vision' => 'Test Vision',
            'mission' => 'Test Mission',
            'image_4' => 'img/services/relaxingMen.webp',
        ]);

        AboutGlanceItem::factory()->create([
            'about_id' => $about->id,
            'order' => 1,
            'title' => 'Glance Title',
            'description' => 'Glance Description',
        ]);

        $response = $this->get(route('admin.about.index'));

        $response->assertStatus(200);
        $response->assertSee('Test Title');
        $response->assertSee('Test Subtitle');
        $response->assertSee('Test Description');
        $response->assertSee('Test Philosophy');
        $response->assertSee('Test Vision');
        $response->assertSee('Test Mission');
        $response->assertSee('Glance Title');
        $response->assertSee('Glance Description');
    }

    public function test_about_page_creates_record_when_none_exists(): void
    {
        $user = $this->actingAsAdmin();

        $response = $this->get(route('admin.about.index'));

        $response->assertStatus(200);
        $response->assertSee('Publish Core');
    }

    public function test_about_page_updates_existing_record(): void
    {
        $user = $this->actingAsAdmin();

        $about = About::factory()->create([
            'title' => 'Original Title',
        ]);

        $this->actingAs($user, 'web');

        $component = Livewire::test(AboutPageManager::class);

        $component->assertSee('Original Title');

        $component->set('title', 'Updated Title')
            ->set('subtitle', 'Updated Subtitle')
            ->set('description', 'Updated Description')
            ->set('philosophy', 'Updated Philosophy')
            ->set('vision', 'Updated Vision')
            ->set('mission', 'Updated Mission')
            ->set('glanceItems.0.title', 'New Glance Title')
            ->set('glanceItems.0.description', 'New Glance Description');

        $component->call('save');

        $this->assertDatabaseHas('abouts', [
            'id' => $about->id,
            'title' => 'Updated Title',
            'subtitle' => 'Updated Subtitle',
            'mission' => 'Updated Mission',
        ]);

        $this->assertDatabaseHas('about_glance_items', [
            'about_id' => $about->id,
            'title' => 'New Glance Title',
            'description' => 'New Glance Description',
        ]);
    }

    public function test_about_page_syncs_glance_items(): void
    {
        $user = $this->actingAsAdmin();

        $about = About::factory()->create();

        $this->actingAs($user, 'web');

        $component = Livewire::test(AboutPageManager::class);

        $component->set('glanceItems', [
            ['id' => null, 'order' => 1, 'title' => 'Item 1', 'description' => 'Desc 1'],
            ['id' => null, 'order' => 2, 'title' => 'Item 2', 'description' => 'Desc 2'],
        ])->call('save');

        $this->assertDatabaseCount('about_glance_items', 2);
        $this->assertDatabaseHas('about_glance_items', [
            'about_id' => $about->id,
            'title' => 'Item 1',
            'order' => 1,
        ]);
        $this->assertDatabaseHas('about_glance_items', [
            'about_id' => $about->id,
            'title' => 'Item 2',
            'order' => 2,
        ]);
    }
}
