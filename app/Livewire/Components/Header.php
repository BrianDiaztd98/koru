<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Livewire\Component;

class Header extends Component
{
    public string $locale = 'en';

    public array $headerNavItems = [];

    public function mount(): void
    {
        $this->locale = Session::get('locale', app()->getLocale() ?: 'en');

        $this->headerNavItems = [
            ['label' => 'About', 'href' => '#about-us'],
            ['label' => 'Services', 'href' => '#services'],
            ['label' => 'Education', 'href' => '#education'],
            ['label' => 'Team', 'href' => '#team'],
            ['label' => 'Location', 'href' => '#location'],
        ];
    }

    public function updatedLocale(string $value): void
    {
        $this->locale = in_array($value, ['en', 'es']) ? $value : 'en';

        $this->dispatch('locale-changed', locale: $this->locale);
    }

    public function render(): View
    {
        return view('livewire.components.header');
    }
}
