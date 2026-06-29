<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;

class ServicePillars extends Component
{
    public array $pillarLabels = [];

    public string $activePillar = 'recovery_performance';

    public array $servicesByPillar = [];

    #[On('set-pillar')]
    public function setPillar(string $pillar): void
    {
        if (array_key_exists($pillar, $this->pillarLabels)) {
            $this->activePillar = $pillar;
        }
    }

    public function render()
    {
        return view('livewire.components.service-pillars');
    }
}
