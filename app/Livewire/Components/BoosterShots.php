<?php

namespace App\Livewire\Components;

use Livewire\Component;

class BoosterShots extends Component
{
    public array $boosterShots = [];

    public function mount(array $boosterShots = []): void
    {
        $this->boosterShots = $boosterShots;
    }

    public function render()
    {
        return view('livewire.components.booster-shots');
    }
}
