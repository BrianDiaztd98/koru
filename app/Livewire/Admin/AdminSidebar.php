<?php

namespace App\Livewire\Admin;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class AdminSidebar extends Component
{
    public string $activeTarget;

    public array $coreLinks = [];

    public array $sectionLinks = [];

    public function mount(): void
    {
        $this->activeTarget = $this->resolveActiveTarget();
        $this->coreLinks = $this->buildCoreLinks();
        $this->sectionLinks = $this->buildSectionLinks();
    }

    public function render(): View
    {
        return view('livewire.admin.admin-sidebar');
    }

    private function resolveActiveTarget(): string
    {
        return match (Route::currentRouteName()) {
            'admin.about.index',
            'admin.about.edit',
            'admin.about.create' => 'about',
            'admin.services.index',
            'admin.services.create',
            'admin.services.edit' => 'services',
            'admin.client-outcomes.index',
            'admin.client-outcomes.create',
            'admin.client-outcomes.edit' => 'client-outcomes',
            'admin.team.index',
            'admin.team.create',
            'admin.team.edit' => 'team',
            'admin.packages.index',
            'admin.packages.create',
            'admin.packages.edit' => 'packages',
            default => 'inicio',
        };
    }

    private function buildCoreLinks(): array
    {
        return [
            [
                'route' => 'admin.management.index',
                'section' => 'inicio',
                'label' => 'Inicio',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />',
            ],
            [
                'route' => 'admin.about.index',
                'section' => 'about',
                'label' => 'About Section',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 3.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />',
            ],
        ];
    }

    private function buildSectionLinks(): array
    {
        return [
            [
                'route' => 'admin.services.index',
                'section' => 'services',
                'label' => 'Services',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />',
            ],
            [
                'route' => 'admin.client-outcomes.index',
                'section' => 'client-outcomes',
                'label' => 'Client Outcomes',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 8.25V18a2.25 2.25 0 0 0 2.25 2.25h13.5A2.25 2.25 0 0 0 21 18V8.25M3 8.25l9 6 9-6M3 8.25l9 6 9-6" />',
            ],
            [
                'route' => 'admin.team.index',
                'section' => 'team',
                'label' => 'Team',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 0115 0" />',
            ],
            [
                'route' => 'admin.packages.index',
                'section' => 'packages',
                'label' => 'Packages',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0 1.125.504 1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />',
            ],
        ];
    }
}
