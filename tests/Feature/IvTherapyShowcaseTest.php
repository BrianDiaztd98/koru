<?php

namespace Tests\Feature;

use App\Livewire\Components\IvTherapy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class IvTherapyShowcaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_iv_therapy_showcase_combines_iv_and_booster_items(): void
    {
        Livewire::test(IvTherapy::class, [
            'ivDrips' => [[
                'id' => 1,
                'title' => 'Hydration IV',
                'description' => 'Hydration support.',
                'price' => '150.00',
                'duration' => '60 min',
                'whatsapp_url' => 'https://wa.me/17867528054',
                'has_down_payment' => false,
            ]],
            'boosterShots' => [[
                'id' => 2,
                'title' => 'Vitamin B12',
                'description' => 'Targeted support.',
                'price' => '35.00',
                'whatsapp_url' => 'https://wa.me/17867528054',
                'has_down_payment' => false,
            ]],
        ])
            ->assertSet('therapyItems.0.type', 'iv')
            ->assertSet('therapyItems.1.type', 'booster')
            ->assertSee('Hydration IV')
            ->assertSee('Vitamin B12')
            ->assertSee('IV Infusion Therapy')
            ->assertSee('Booster Shot');
    }
}
