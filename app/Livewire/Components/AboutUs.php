<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AboutUs extends Component
{
    public array $aboutData = [];

    public function mount(array $aboutData = []): void
    {
        $this->aboutData = $aboutData;
    }

    public function render()
    {
        return view('livewire.components.about-us');
    }
}
