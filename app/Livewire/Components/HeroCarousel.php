<?php

namespace App\Livewire\Components;

use Livewire\Component;

class HeroCarousel extends Component
{
    public array $slides = [];

    public function render()
    {
        return view('livewire.components.hero-carousel');
    }
}
