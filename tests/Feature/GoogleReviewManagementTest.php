<?php

namespace Tests\Feature;

use App\Livewire\Components\TestimonialsShowcase;
use Livewire\Livewire;
use Tests\TestCase;

class GoogleReviewManagementTest extends TestCase
{
    public function test_testimonials_showcase_loads_the_elfsight_widget(): void
    {
        Livewire::test(TestimonialsShowcase::class)
            ->assertSee('elfsight-app-be1013f4-e4b9-4aae-9bbe-a88382263533', false);
    }

    public function test_testimonials_showcase_uses_the_widget_without_local_reviews(): void
    {
        Livewire::test(TestimonialsShowcase::class)
            ->assertSee('elfsight-app-be1013f4-e4b9-4aae-9bbe-a88382263533', false)
            ->assertDontSee('No client outcomes available yet');
    }
}
