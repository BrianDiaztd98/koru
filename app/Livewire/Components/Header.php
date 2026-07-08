<?php

namespace App\Livewire\Components;

use Illuminate\View\View;
use Livewire\Component;

class Header extends Component
{
    public array $headerNavItems = [];

    public function mount(): void
    {
        $this->headerNavItems = [
            ['label' => 'About', 'href' => '#about-us'],
            ['label' => 'Services', 'href' => '#services'],
            ['label' => 'Education', 'href' => '#education'],
            ['label' => 'Team', 'href' => '#team'],
            ['label' => 'Location', 'href' => '#location'],
        ];
    }

    public function render(): View
    {
        return view('livewire.components.header');
    }
}
