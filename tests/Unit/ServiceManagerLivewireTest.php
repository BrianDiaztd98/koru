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

    public function test_default_filter_shows_manual_therapy_services(): void
    {
        $user = $this->adminUser();

        Service::factory()->create(['category' => 'manual_therapy', 'name_en' => 'Massage 1']);
        Service::factory()->create(['category' => 'medical_services', 'name_en' => 'Medical 1']);

        $test = Livewire::test(ServiceManager::class);
        $test->actingAs($user, 'web');
        $test
            ->assertSee('Massage 1')
            ->assertDontSee('Medical 1');
    }

    public function test_featured_column_is_hidden_for_iv_therapy_and_booster_shots(): void
    {
        $user = $this->adminUser();

        Service::factory()->create(['category' => 'iv_therapy', 'name_en' => 'Vitamin Infusion']);

        $test = Livewire::test(ServiceManager::class);
        $test->actingAs($user, 'web');
        $test->set('filterCategory', 'iv_therapy')
            ->assertSee('Vitamin Infusion')
            ->assertDontSee('Featured');
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

    public function test_service_can_be_marked_as_featured(): void
    {
        $user = $this->adminUser();

        $test = Livewire::test(ServiceManager::class);
        $test->actingAs($user, 'web');
        $test
            ->set('name_en', 'Featured Service')
            ->set('description_en', 'A featured service')
            ->set('duration', '60 min')
            ->set('price', '149.99')
            ->set('category', 'manual_therapy')
            ->set('is_featured', true)
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('services', [
            'name_en' => 'Featured Service',
            'is_featured' => true,
        ]);
    }

    public function test_iv_therapy_and_booster_shots_cannot_be_featured(): void
    {
        $user = $this->adminUser();

        foreach (['iv_therapy', 'booster_shots'] as $category) {
            $test = Livewire::test(ServiceManager::class);
            $test->actingAs($user, 'web');
            $test->set('name_en', ucfirst(str_replace('_', ' ', $category)))
                ->set('description_en', 'A service that cannot be featured')
                ->set('duration', '30 min')
                ->set('price', '99.99')
                ->set('category', $category)
                ->set('is_featured', true)
                ->call('save')
                ->assertHasNoErrors();
        }

        $this->assertDatabaseCount('services', 2);
        $this->assertDatabaseHas('services', ['category' => 'iv_therapy', 'is_featured' => false]);
        $this->assertDatabaseHas('services', ['category' => 'booster_shots', 'is_featured' => false]);
    }

    public function test_up_to_three_services_can_be_featured_and_fourth_is_rejected(): void
    {
        $user = $this->adminUser();
        $featuredServices = Service::factory()->count(3)->create(['category' => 'manual_therapy', 'is_featured' => true]);
        $fourthService = Service::factory()->create(['category' => 'recovery_performance']);

        $test = Livewire::test(ServiceManager::class);
        $test->actingAs($user, 'web');
        $test->call('toggleFeatured', $fourthService->id);

        $this->assertSame(3, Service::query()->where('is_featured', true)->count());
        $this->assertDatabaseHas('services', ['id' => $fourthService->id, 'is_featured' => false]);

        $test->call('toggleFeatured', $featuredServices->first()->id);

        $this->assertDatabaseHas('services', ['id' => $featuredServices->first()->id, 'is_featured' => false]);
    }

    public function test_featured_services_can_be_marked_as_most_sellers(): void
    {
        $user = $this->adminUser();
        $firstService = Service::factory()->create(['category' => 'manual_therapy', 'is_featured' => true, 'is_best_seller' => true]);
        $secondService = Service::factory()->create(['category' => 'recovery_performance', 'is_featured' => true]);

        $test = Livewire::test(ServiceManager::class);
        $test->actingAs($user, 'web');
        $test->call('toggleBestSeller', $secondService->id);

        $this->assertDatabaseHas('services', ['id' => $firstService->id, 'is_best_seller' => true]);
        $this->assertDatabaseHas('services', ['id' => $secondService->id, 'is_best_seller' => true]);
    }

    public function test_non_featured_services_cannot_be_marked_as_most_seller(): void
    {
        $user = $this->adminUser();
        $service = Service::factory()->create(['category' => 'manual_therapy', 'is_featured' => false]);

        $test = Livewire::test(ServiceManager::class);
        $test->actingAs($user, 'web');
        $test->call('toggleBestSeller', $service->id);

        $this->assertDatabaseHas('services', ['id' => $service->id, 'is_best_seller' => false]);
    }
}
