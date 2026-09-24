<div class="space-y-6">
    @include('livewire.admin.partials.page-header', [
        'eyebrow' => 'Administration',
        'title' => 'Appearance',
        'description' => 'Choose the visual mode used across the public website and admin panel.',
    ])

    @include('livewire.admin.partials.success-alert')

    <form wire:submit="save" class="admin-form-panel appearance-settings-panel max-w-3xl">
        <div class="grid gap-4 sm:grid-cols-2">
            <label class="group relative cursor-pointer">
                <input wire:model="themeMode" type="radio" value="dark" class="peer sr-only">
                <span class="appearance-card-dark block rounded-xl border border-slate-800 bg-slate-950/70 p-5 shadow-sm transition duration-200 ease-out group-hover:-translate-y-0.5 group-hover:border-slate-700 group-hover:shadow-lg group-active:scale-[0.98] peer-focus-visible:ring-2 peer-focus-visible:ring-[#02B8BC] peer-checked:border-[#02B8BC] peer-checked:bg-[#02B8BC]/[.08] peer-checked:shadow-lg peer-checked:ring-2 peer-checked:ring-[#02B8BC]/20">
                    <span class="flex items-center justify-between">
                        <span class="appearance-card-dark-title text-sm font-semibold text-white">Dark mode</span>
                        <span class="flex h-5 w-5 items-center justify-center rounded-full border border-[#02B8BC]/60 transition duration-200 group-has-[:checked]:border-[#02B8BC] group-has-[:checked]:bg-[#02B8BC]">
                            <span class="h-1.5 w-1.5 scale-0 rounded-full bg-white transition duration-200 group-has-[:checked]:scale-100"></span>
                        </span>
                    </span>
                    <span class="appearance-card-dark-description mt-2 block text-xs leading-5 text-slate-400">The current KORU console style with deep backgrounds and aqua accents.</span>
                </span>
            </label>

            <label class="group relative cursor-pointer">
                <input wire:model="themeMode" type="radio" value="light" class="peer sr-only">
                <span class="appearance-card-light block rounded-xl border border-slate-800 bg-slate-100 p-5 shadow-sm transition duration-200 ease-out group-hover:-translate-y-0.5 group-hover:border-slate-700 group-hover:shadow-lg group-active:scale-[0.98] peer-focus-visible:ring-2 peer-focus-visible:ring-[#02B8BC] peer-checked:border-[#02B8BC] peer-checked:bg-[#02B8BC]/[.08] peer-checked:shadow-lg peer-checked:ring-2 peer-checked:ring-[#02B8BC]/20">
                    <span class="flex items-center justify-between">
                        <span class="appearance-card-light-title text-sm font-semibold text-slate-900">Light mode</span>
                        <span class="flex h-5 w-5 items-center justify-center rounded-full border border-[#037E93]/60 transition duration-200 group-has-[:checked]:border-[#02B8BC] group-has-[:checked]:bg-[#02B8BC]">
                            <span class="h-1.5 w-1.5 scale-0 rounded-full bg-white transition duration-200 group-has-[:checked]:scale-100"></span>
                        </span>
                    </span>
                    <span class="appearance-card-light-description mt-2 block text-xs leading-5 text-slate-600">A brighter presentation using the same KORU teal, aqua, and Montserrat system.</span>
                </span>
            </label>
        </div>

        <div class="mt-6 flex justify-end">
            <button type="submit" class="admin-btn-primary">Save appearance</button>
        </div>
    </form>
</div>