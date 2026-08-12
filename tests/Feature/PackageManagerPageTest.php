<?php

namespace Tests\Feature;

use App\Livewire\Admin\PackageManager\PackageManager;
use App\Models\Package;
use App\Models\PackageTerm;
use Database\Seeders\KoruContentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PackageManagerPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_package_terms_are_reseeded_without_stale_records(): void
    {
        PackageTerm::query()->create([
            'content' => 'Legacy term',
            'sort_order' => 99,
            'active_status' => false,
        ]);

        $this->artisan('db:seed', ['--class' => KoruContentSeeder::class])
            ->assertExitCode(0);

        $this->assertDatabaseMissing('package_terms', [
            'content' => 'Legacy term',
        ]);

        $this->assertDatabaseHas('package_terms', [
            'content' => 'Packages are engineered for structured, continuous use to ensure optimal therapeutic outcomes. Sessions may be requested and scheduled based on calendar availability within the active validity period.',
            'active_status' => true,
        ]);
    }

    public function test_package_manager_only_exposes_active_terms(): void
    {
        $package = Package::factory()->create();

        $activeTerm = PackageTerm::query()->create([
            'content' => 'Active term',
            'sort_order' => 1,
            'active_status' => true,
        ]);

        $inactiveTerm = PackageTerm::query()->create([
            'content' => 'Inactive term',
            'sort_order' => 2,
            'active_status' => false,
        ]);

        $package->terms()->syncWithoutDetaching([$activeTerm->id => ['sort_order' => 1]]);
        $package->terms()->syncWithoutDetaching([$inactiveTerm->id => ['sort_order' => 2]]);

        Livewire::test(PackageManager::class)
            ->assertViewHas('terms', function (array $terms): bool {
                $contents = array_column($terms, 'content');

                return in_array('Active term', $contents, true)
                    && ! in_array('Inactive term', $contents, true)
                    && count($terms) === 1;
            });
    }

    public function test_packages_can_be_linked_to_their_terms_through_a_relationship(): void
    {
        $package = Package::factory()->create();
        $term = PackageTerm::query()->create([
            'content' => 'Terms for this package',
            'sort_order' => 1,
            'active_status' => true,
        ]);

        $package->terms()->syncWithoutDetaching([$term->id]);

        $this->assertTrue($package->terms()->whereKey($term->id)->exists());
    }

    public function test_package_price_rejects_values_above_decimal_limit(): void
    {
        Livewire::test(PackageManager::class)
            ->set('name_en', 'Overflow Package')
            ->set('price', '999999999')
            ->set('sessions', 1)
            ->call('save')
            ->assertHasErrors(['price']);

        Livewire::test(PackageManager::class)
            ->set('name_en', 'Valid Package')
            ->set('price', '199.99')
            ->set('sessions', 1)
            ->call('save')
            ->assertHasNoErrors();
    }
}
