<?php

namespace Tests\Feature;

use App\Livewire\Admin\DepositManager\DepositManager;
use App\Models\DayDiscountSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DiscountSettingsPageTest extends TestCase
{
    use RefreshDatabase;

    private function actingAsAdmin(): User
    {
        $user = User::factory()->admin()->create();
        $this->actingAs($user, 'web');

        return $user;
    }

    public function test_discounts_index_route_is_accessible_to_admin(): void
    {
        $this->actingAsAdmin();

        $response = $this->get(route('admin.discounts.index'));

        $response->assertStatus(200);
        $response->assertSee('Deposit Settings');
        $response->assertSee('Deposits by');
    }

    public function test_discounts_index_shows_all_week_days(): void
    {
        $this->actingAsAdmin();

        $response = $this->get(route('admin.discounts.index'));

        foreach (DayDiscountSetting::dayLabelsEs() as $label) {
            $response->assertSee($label);
        }
    }

    public function test_admin_can_save_per_day_discount(): void
    {
        $this->actingAsAdmin();

        Livewire::test(DepositManager::class)
            ->set('percentages.0', '50')
            ->set('activeStatuses.0', true)
            ->set('percentages.1', '20')
            ->set('activeStatuses.1', true)
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('day_discount_settings', [
            'day_of_week' => 0,
            'percentage' => 50,
            'active_status' => true,
        ]);
        $this->assertDatabaseHas('day_discount_settings', [
            'day_of_week' => 1,
            'percentage' => 20,
            'active_status' => true,
        ]);
    }

    public function test_percentage_is_validated_within_range(): void
    {
        $this->actingAsAdmin();

        Livewire::test(DepositManager::class)
            ->set('percentages.0', '150')
            ->call('save')
            ->assertHasErrors('percentages.0');
    }

    public function test_existing_settings_are_loaded_into_form(): void
    {
        DayDiscountSetting::factory()->sunday(50)->create();

        $this->actingAsAdmin();

        Livewire::test(DepositManager::class)
            ->assertSet('percentages.0', '50.00')
            ->assertSet('activeStatuses.0', true);
    }

    public function test_new_days_default_to_inactive_when_no_setting_exists(): void
    {
        $this->actingAsAdmin();

        Livewire::test(DepositManager::class)
            ->assertSet('activeStatuses.1', false)
            ->assertSet('activeStatuses.2', false)
            ->assertSet('activeStatuses.3', false)
            ->assertSet('activeStatuses.4', false)
            ->assertSet('activeStatuses.5', false)
            ->assertSet('activeStatuses.6', false);
    }
}
