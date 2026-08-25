<?php

namespace App\Livewire\Components;

use Livewire\Component;

class IvBento extends Component
{
    public array $ivDrips = [];

    public array $boosterShots = [];

    public function mount(array $ivDrips = [], array $boosterShots = []): void
    {
        $this->ivDrips = $ivDrips;
        $this->boosterShots = $boosterShots;
    }

    public function render()
    {
        return view('livewire.components.iv-bento');
    }
}
