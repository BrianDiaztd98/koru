<?php

namespace Tests\Unit;

use App\Livewire\Admin\ServiceManager\ServiceManager;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ServiceManagerLivewireTest extends TestCase
{
    use RefreshDatabase;

    private function adminUser(): User
    {
        return User::factory()->admin()->create();
    }

    public function test_filter_category_select_filters_services(): void
    {
        $user = $this->adminUser();

        Service::factory()->create(['category' => 'manual_therapy', 'name_en' => 'Massage 1']);
        Service::factory()->create(['category' => 'manual_therapy', 'name_en' => 'Massage 2']);
        Service::factory()->create(['category' => 'medical_services', 'name_en' => 'Medical 1']);

        $test = Livewire::test(ServiceManager::class);
        $test->actingAs($user, 'web');
        $test->set('filterCategory', 'manual_therapy')
            ->assertSee('Massage 1')
            ->assertSee('Massage 2')
            ->assertDontSee('Medical 1');
    }

    public function test_filter_category_all_shows_all_services(): void
    {
        $user = $this->adminUser();

        Service::factory()->create(['category' => 'manual_therapy', 'name_en' => 'Massage 1']);
        Service::factory()->create(['category' => 'medical_services', 'name_en' => 'Medical 1']);

        $test = Livewire::test(ServiceManager::class);
        $test->actingAs($user, 'web');
        $test->set('filterCategory', 'all')
            ->assertSee('Massage 1')
            ->assertSee('Medical 1');
    }

    public function test_creating_a_service_shows_the_inline_form_panel(): void
    {
        $user = $this->adminUser();

        $test = Livewire::test(ServiceManager::class);
        $test->actingAs($user, 'web');
        $test->call('openCreateForm')
            ->assertSet('showForm', true)
            ->assertSee('Manage clinical and sports disciplines across the public system registries.')
            ->assertDontSee('fixed inset-0 z-50');
    }

    public function test_service_price_rejects_values_above_decimal_limit(): void
    {
        $user = $this->adminUser();

        $test = Livewire::test(ServiceManager::class);
        $test->actingAs($user, 'web');
        $test->set('name_en', 'Overflow Service')
            ->set('description_en', 'Too expensive')
            ->set('duration', '60 min')
            ->set('price', '999999999')
            ->set('category', 'manual_therapy')
            ->call('save')
            ->assertHasErrors(['price']);

        $valid = Livewire::test(ServiceManager::class);
        $valid->actingAs($user, 'web');
        $valid->set('name_en', 'Valid Service')
            ->set('description_en', 'Reasonable price')
            ->set('duration', '60 min')
            ->set('price', '149.99')
            ->set('category', 'manual_therapy')
            ->call('save')
            ->assertHasNoErrors();
    }
}
