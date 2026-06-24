<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Header extends Component
{
    public string $locale = 'en';

    public array $headerNavItems = [];

    public function mount(): void
    {
        $this->locale = app()->getLocale() ?: 'en';

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

    public function render()
    {
        return view('livewire.components.header');
    }
}
