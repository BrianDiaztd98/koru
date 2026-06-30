<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AdminSidebar extends Component
{
    public string $activeTarget;

    public function mount(string $activeTarget = 'inicio')
    {
        $this->activeTarget = $activeTarget;
    }

    public function render()
    {
        return view('livewire.admin.admin-sidebar');
    }
}
