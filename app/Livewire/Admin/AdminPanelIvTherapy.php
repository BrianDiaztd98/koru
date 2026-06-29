<?php

namespace App\Livewire\Admin;

use App\Models\Service;
use Illuminate\Support\Collection;
use Livewire\Component;

class AdminPanelIvTherapy extends Component
{
    public array $categories;

    public Collection $services;

    public function mount(array $categories)
    {
        $this->categories = $categories;
        $this->services = Service::query()
            ->where('category', 'iv_therapy')
            ->orderBy('name_en')
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.admin-panel-iv-therapy');
    }
}
