<?php

namespace App\Livewire\Admin;

use App\Models\About;
use Livewire\Component;

class AdminPanelAbout extends Component
{
    public ?About $about;

    public function mount(?About $about = null)
    {
        $this->about = $about;
    }

    public function render()
    {
        return view('livewire.admin.admin-panel-about');
    }
}
