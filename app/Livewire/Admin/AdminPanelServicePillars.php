<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Collection;
use Livewire\Component;

class AdminPanelServicePillars extends Component
{
    public array $categories;

    public array $serviceGroups;

    public Collection $services;

    public function mount(array $categories, array $serviceGroups, Collection $services)
    {
        $this->categories = $categories;
        $this->serviceGroups = $serviceGroups;
        $this->services = $services;
    }

    public function render()
    {
        return view('livewire.admin.admin-panel-service-pillars');
    }
}
