<?php

namespace App\Livewire\Components;

use Livewire\Component;

class TestimonialsShowcase extends Component
{
    public array $testimonials = [];

    public function render()
    {
        return view('livewire.components.testimonials-showcase');
    }
}
