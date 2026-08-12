<?php

namespace App\Livewire\Components;

use Illuminate\View\View;
use Livewire\Component;

class Header extends Component
{
    public array $headerNavItems = [];

    public string $whatsappBookingUrl = 'https://wa.me/17867528054';

    public function mount(?array $headerNavItems = null, ?string $whatsappBookingUrl = null): void
    {
        $this->headerNavItems = $headerNavItems ?? [
            ['label' => 'About', 'href' => '#about-us'],
            ['label' => 'Services', 'href' => '#services'],
            ['label' => 'Education', 'href' => '#education'],
            ['label' => 'Team', 'href' => '#team'],
            ['label' => 'Location', 'href' => '#location'],
        ];

        if (! empty($whatsappBookingUrl)) {
            $this->whatsappBookingUrl = $whatsappBookingUrl;
        }
    }

    public function render(): View
    {
        return view('livewire.components.header');
    }
}
