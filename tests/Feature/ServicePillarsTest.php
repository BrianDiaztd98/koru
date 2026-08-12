<?php

namespace Tests\Feature;

use App\Livewire\Components\ServicePillars;
use Livewire\Livewire;
use Tests\TestCase;

class ServicePillarsTest extends TestCase
{
    private array $pillarLabels = [
        'manual_therapy' => ['title' => 'Massage Services', 'summary' => 'Clinical massage.'],
        'recovery_performance' => ['title' => 'Therapy Services', 'summary' => 'Recovery tech.'],
        'medical_services' => ['title' => 'Medical Services', 'summary' => 'Medical.'],
        'koru_at_home' => ['title' => 'KORU At Home', 'summary' => 'At home.'],
    ];

    private array $servicesByPillar = [
        'manual_therapy' => [['id' => 1, 'title' => 'Deep Tissue', 'description' => 'desc', 'duration' => '60 min', 'image' => 'img/x.jpg', 'price' => '120.00']],
        'recovery_performance' => [['id' => 2, 'title' => 'Recovery', 'description' => 'desc', 'duration' => '45 min', 'image' => 'img/y.jpg', 'price' => '90.00']],
        'medical_services' => [['id' => 3, 'title' => 'Medical', 'description' => 'desc', 'duration' => '30 min', 'image' => 'img/z.jpg', 'price' => '150.00']],
        'koru_at_home' => [['id' => 4, 'title' => 'Home', 'description' => 'desc', 'duration' => '90 min', 'image' => 'img/w.jpg', 'price' => '200.00']],
    ];

    public function test_default_active_pillar_is_manual_therapy(): void
    {
        Livewire::test(ServicePillars::class, [
            'pillarLabels' => $this->pillarLabels,
            'servicesByPillar' => $this->servicesByPillar,
        ])
            ->assertSet('activePillar', 'manual_therapy')
            ->assertSee('Deep Tissue')
            ->assertDontSee('Recovery');
    }

    public function test_switching_pillar_updates_active_state_and_content(): void
    {
        Livewire::test(ServicePillars::class, [
            'pillarLabels' => $this->pillarLabels,
            'servicesByPillar' => $this->servicesByPillar,
        ])
            ->call('setPillar', 'recovery_performance')
            ->assertSet('activePillar', 'recovery_performance')
            ->assertSee('Recovery')
            ->assertDontSee('Deep Tissue');
    }

    public function test_switching_to_medical_services_pillar_works(): void
    {
        Livewire::test(ServicePillars::class, [
            'pillarLabels' => $this->pillarLabels,
            'servicesByPillar' => $this->servicesByPillar,
        ])
            ->call('setPillar', 'medical_services')
            ->assertSet('activePillar', 'medical_services')
            ->assertSee('Medical');
    }

    public function test_invalid_pillar_is_ignored(): void
    {
        Livewire::test(ServicePillars::class, [
            'pillarLabels' => $this->pillarLabels,
            'servicesByPillar' => $this->servicesByPillar,
        ])
            ->call('setPillar', 'non_existent_pillar')
            ->assertSet('activePillar', 'manual_therapy');
    }
}
