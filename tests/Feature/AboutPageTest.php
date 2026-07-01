<?php

namespace Tests\Feature;

use App\Models\About;
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
            'feature_1_title' => 'Feature 1',
            'feature_1_description' => 'Feature 1 Desc',
            'feature_2_title' => 'Feature 2',
            'feature_2_description' => 'Feature 2 Desc',
        ]);

        $response = $this->get(route('admin.about.index'));

        $response->assertStatus(200);
        $response->assertSee('Test Title');
        $response->assertSee('Test Subtitle');
        $response->assertSee('Test Description');
        $response->assertSee('Test Philosophy');
        $response->assertSee('Test Vision');
        $response->assertSee('Feature 1');
        $response->assertSee('Feature 1 Desc');
        $response->assertSee('Feature 2');
        $response->assertSee('Feature 2 Desc');
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

        $component = Livewire::test(\App\Livewire\Admin\AboutPage::class);

        $component->assertSee('Original Title');

        $component->set('title', 'Updated Title')
            ->set('subtitle', 'Updated Subtitle')
            ->set('description', 'Updated Description')
            ->set('philosophy', 'Updated Philosophy')
            ->set('vision', 'Updated Vision')
            ->set('feature_1_title', 'Updated Feature 1')
            ->set('feature_1_description', 'Updated Feature 1 Desc')
            ->set('feature_2_title', 'Updated Feature 2')
            ->set('feature_2_description', 'Updated Feature 2 Desc');

        $component->call('save');

        $this->assertDatabaseHas('abouts', [
            'id' => $about->id,
            'title' => 'Updated Title',
            'subtitle' => 'Updated Subtitle',
        ]);
    }
}
