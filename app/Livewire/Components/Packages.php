<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Packages extends Component
{
    public array $packages = [];

    public function mount(array $packages = []): void
    {
        $this->packages = $packages;
    }

    public function render()
    {
        return view('livewire.components.packages');
    }
}
