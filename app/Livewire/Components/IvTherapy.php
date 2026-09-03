<?php

namespace App\Livewire\Components;

use Livewire\Component;

class IvTherapy extends Component
{
    public array $ivDrips = [];

    public array $boosterShots = [];

    public function mount(array $ivDrips = [], array $boosterShots = []): void
    {
        $this->ivDrips = array_map(
            fn (array $item): array => array_merge($item, [
                'type' => 'iv',
                'type_label' => 'IV Infusion Therapy',
                'duration' => $item['duration'] ?? 'By consultation',
            ]),
            $ivDrips,
        );

        $this->boosterShots = array_map(
            fn (array $item): array => array_merge($item, [
                'type' => 'booster',
                'type_label' => 'Booster Shot',
                'duration' => $item['duration'] ?? 'By consultation',
                'icon' => 'booster',
            ]),
            $boosterShots,
        );
    }

    public function render()
    {
        return view('livewire.components.iv-therapy');
    }
}
