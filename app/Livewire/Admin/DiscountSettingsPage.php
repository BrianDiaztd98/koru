<?php

namespace App\Livewire\Admin;

use App\Models\DayDiscountSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class DiscountSettingsPage extends Component
{
    /** @var array<int, string> Porcentaje por día (clave = day_of_week 0-6). */
    public array $percentages = [];

    /** @var array<int, bool> Estado activo por día. */
    public array $activeStatuses = [];

    public bool $saved = false;

    protected function rules(): array
    {
        return [
            'percentages' => ['array'],
            'percentages.*' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'activeStatuses' => ['array'],
            'activeStatuses.*' => ['boolean'],
        ];
    }

    public function mount(): void
    {
        foreach (DayDiscountSetting::days() as $dayOfWeek => $key) {
            $this->percentages[$dayOfWeek] = '';
            $this->activeStatuses[$dayOfWeek] = false;
        }

        foreach (DayDiscountSetting::query()->get() as $setting) {
            $this->percentages[$setting->day_of_week] = (string) $setting->percentage;
            $this->activeStatuses[$setting->day_of_week] = $setting->active_status;
        }
    }

    public function save(): void
    {
        $validated = $this->validate();

        foreach (DayDiscountSetting::days() as $dayOfWeek => $key) {
            $raw = $validated['percentages'][$dayOfWeek] ?? '';
            $percentage = $raw === '' || $raw === null ? 0 : (float) $raw;
            $active = (bool) ($validated['activeStatuses'][$dayOfWeek] ?? false);

            DayDiscountSetting::query()->updateOrCreate(
                ['day_of_week' => $dayOfWeek],
                [
                    'percentage' => $percentage,
                    'active_status' => $active,
                ]
            );
        }

        // Log validated payload for debugging client-side issues.
        Log::info('DiscountSettingsPage::save called', $validated);

        // Invalidate cache and eagerly rebuild it so other requests (landing) read the fresh map immediately.
        Cache::forget(DayDiscountSetting::CACHE_KEY);
        $map = DayDiscountSetting::query()
            ->where('active_status', true)
            ->pluck('percentage', 'day_of_week')
            ->map(fn ($v) => (float) $v)
            ->all();
        Cache::put(DayDiscountSetting::CACHE_KEY, $map, 3600);

        session()->flash('success', 'Abonos por día guardados correctamente.');
        $this->saved = true;
    }

    public function render(): View
    {
        return view('livewire.admin.discount-settings-manager.discount-settings-manager-page', [
            'days' => DayDiscountSetting::days(),
            'dayLabels' => DayDiscountSetting::dayLabelsEs(),
        ])
            ->layout('components.layouts.admin');
    }
}
