<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ServicePillars extends Component
{
    public array $pillarLabels = [];

    public string $activePillar = 'manual_therapy';

    public array $servicesByPillar = [];

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
