<?php

namespace App\Livewire\Admin;

use App\Models\Service;
use Illuminate\Support\Collection;
use Livewire\Component;

class AdminPanelBoosterShots extends Component
{
    public array $categories;

    public Collection $services;

    public function mount(array $categories)
    {
        $this->categories = $categories;
        $this->services = Service::query()
            ->where('category', 'booster_shots')
            ->orderBy('name_en')
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.admin-panel-booster-shots');
    }
}
