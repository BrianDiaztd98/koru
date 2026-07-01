<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Packages extends Component
{
    public array $packages = [];

    public array $terms = [];

    public function mount(array $packages = [], array $terms = []): void
    {
        $this->packages = $packages;
        $this->terms = $terms;
    }

    public function render()
    {
        return view('livewire.components.packages');
    }
}
