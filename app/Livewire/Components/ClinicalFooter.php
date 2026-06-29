<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ClinicalFooter extends Component
{
    public array $localizedSettings = [];

    public function mount(array $localizedSettings = []): void
    {
        $this->localizedSettings = $localizedSettings;
    }

    public function render()
    {
        return view('livewire.components.clinical-footer');
    }
}
