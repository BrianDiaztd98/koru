<?php

namespace Tests\Feature;

use App\Livewire\Admin\AppearanceManager\AppearanceManager;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AppearanceManagerTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_save_the_global_theme_mode(): void
    {
        $this->actingAs(User::factory()->admin()->create());

        Livewire::test(AppearanceManager::class)
            ->set('themeMode', 'light')
            ->call('save')
            ->assertHasNoErrors();

        $this->assertSame('light', SiteSetting::getValue('theme_mode'));
    }

    public function test_public_layout_uses_the_saved_theme_mode(): void
    {
        SiteSetting::query()->create(['key' => 'theme_mode', 'value' => 'light']);

        $this->get('/')->assertSee('class="scroll-smooth theme-light"', false);
    }

    public function test_admin_layout_uses_the_saved_theme_mode(): void
    {
        SiteSetting::query()->create(['key' => 'theme_mode', 'value' => 'light']);

        $this->actingAs(User::factory()->admin()->create());

        $this->get(route('admin.management.index'))
            ->assertSee('class="h-full theme-light"', false);
    }
}
