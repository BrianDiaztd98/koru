<?php

namespace App\Livewire\Admin\AppearanceManager;

use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AppearanceManager extends Component
{
    public string $themeMode = 'dark';

    public function mount(): void
    {
        $this->themeMode = SiteSetting::getValue('theme_mode', 'dark');
    }

    protected function rules(): array
    {
        return [
            'themeMode' => ['required', 'in:dark,light'],
        ];
    }

    public function save(): void
    {
        $validated = $this->validate();

        SiteSetting::query()->updateOrCreate(
            ['key' => 'theme_mode'],
            ['value' => $validated['themeMode']],
        );

        session()->flash('success', 'Appearance settings updated successfully.');
        $this->js('window.location.reload()');
    }

    public function render(): View
    {
        return view('livewire.admin.appearance-manager.appearance-manager-page')
            ->layout('components.layouts.admin');
    }
}
