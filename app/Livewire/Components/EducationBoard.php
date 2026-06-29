<?php

namespace App\Livewire\Components;

use Livewire\Component;

class EducationBoard extends Component
{
    public array $activeCourses = [];

    public function mount(array $activeCourses = []): void
    {
        $this->activeCourses = $activeCourses;
    }

    public function render()
    {
        return view('livewire.components.education-board');
    }
}
