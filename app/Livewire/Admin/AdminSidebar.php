<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class AdminSidebar extends Component
{
    public string $activeTarget;

    public function mount(): void
    {
        $this->activeTarget = $this->resolveActiveTarget();
    }

    public function render()
    {
        return view('livewire.admin.admin-sidebar');
    }

    private function resolveActiveTarget(): string
    {
        $routeName = Route::currentRouteName();

        return match ($routeName) {
            'admin.about.index',
            'admin.about.edit',
            'admin.about.create' => 'about',
            'admin.services.index',
            'admin.services.create',
            'admin.services.edit' => 'services',
            'admin.packages.index',
            'admin.packages.create',
            'admin.packages.edit' => 'packages',
            default => 'inicio',
        };
    }
}
