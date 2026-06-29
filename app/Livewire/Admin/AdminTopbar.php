<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AdminTopbar extends Component
{
    public string $title;

    public function mount(string $title = 'Dashboard')
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('livewire.admin.admin-topbar');
    }
}
