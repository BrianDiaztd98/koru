<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AdminSidebar extends Component
{
    public bool $dashboard;

    public ?string $activeTarget;

    public function mount(bool $dashboard = false, ?string $activeTarget = null)
    {
        $this->dashboard = $dashboard;
        $this->activeTarget = $activeTarget ?? ($dashboard ? 'inicio' : null);
    }

    public function render()
    {
        return view('livewire.admin.admin-sidebar');
    }
}
