<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AboutUs extends Component
{
    public array $aboutData = [];

    public string $bookingUrl = '#location';

    public function mount(array $aboutData = [], string $bookingUrl = '#location'): void
    {
        $this->aboutData = $aboutData;
        $this->bookingUrl = $bookingUrl;
    }

    public function render()
    {
        return view('livewire.components.about-us');
    }
}
