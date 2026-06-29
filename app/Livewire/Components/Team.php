<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Team extends Component
{
    public array $teamMembers = [];

    public function mount(array $teamMembers = []): void
    {
        $this->teamMembers = $teamMembers;
    }

    public function render()
    {
        return view('livewire.components.team');
    }
}
