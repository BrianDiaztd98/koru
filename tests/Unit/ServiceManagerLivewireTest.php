<?php

namespace Tests\Unit;

use App\Livewire\Admin\ServiceManager\ServiceManagerPage;
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

        Livewire::test(ServiceManagerPage::class)
            ->actingAs($user, 'web')
            ->set('filterCategory', 'manual_therapy')
            ->assertSee('Massage 1')
            ->assertSee('Massage 2')
            ->assertDontSee('Medical 1');
    }

    public function test_filter_category_all_shows_all_services(): void
    {
        $user = $this->adminUser();

        Service::factory()->create(['category' => 'manual_therapy', 'name_en' => 'Massage 1']);
        Service::factory()->create(['category' => 'medical_services', 'name_en' => 'Medical 1']);

        Livewire::test(ServiceManagerPage::class)
            ->actingAs($user, 'web')
            ->set('filterCategory', 'all')
            ->assertSee('Massage 1')
            ->assertSee('Medical 1');
    }
}
