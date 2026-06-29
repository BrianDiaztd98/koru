<?php

namespace App\Livewire\Components;

use Livewire\Component;

class IvBento extends Component
{
    public array $ivDrips = [];

    public function mount(array $ivDrips = []): void
    {
        $this->ivDrips = $ivDrips;
    }

    public function render()
    {
        return view('livewire.components.iv-bento');
    }
}
