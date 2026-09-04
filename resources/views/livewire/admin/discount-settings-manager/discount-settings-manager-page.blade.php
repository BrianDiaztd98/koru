<div class="space-y-6">
    @include('livewire.admin.partials.page-header', [
        'eyebrow' => 'Commercial Offer',
        'title' => 'Deposit Settings',
        'description' => 'Deposits by day of the week: define the deposit percentage (initial payment) applied automatically to services and packages based on the service day. By default, Sundays apply a 50% deposit: the client pays half when booking and the rest at the appointment.',
    ])

    @include('livewire.admin.partials.success-alert')

    <form wire:submit.prevent="save" class="admin-card">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-white">Deposit by day</h3>
            <span class="text-[11px] text-slate-500">Allowed range: 0% – 100%</span>
        </div>

        <div class="admin-table-shell">
            <div class="admin-table-head grid-cols-[1fr_0.4fr_0.6fr]">
                <span>Day</span>
                <span>Active</span>
                <span>Deposit %</span>
            </div>
            @foreach ($days as $dayOfWeek => $dayKey)
                <div class="admin-table-row grid-cols-[1fr_0.4fr_0.6fr]">
                    <div class="font-medium text-slate-200">{{ $dayLabels[$dayOfWeek] ?? $dayKey }}</div>
                    <div>
                        <input type="checkbox" wire:model="activeStatuses.{{ $dayOfWeek }}" id="day_active_{{ $dayOfWeek }}"
                               class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#02B8BC] focus:ring-[#02B8BC]" />
                    </div>
                    <div>
                        <div class="relative max-w-[140px]">
                            <input type="number" min="0" max="100" step="0.01"
                                   wire:model="percentages.{{ $dayOfWeek }}"
                                   placeholder="0"
                                   class="admin-input pr-9" />
                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-sm font-mono text-slate-500">%</span>
                        </div>
                        @error("percentages.{$dayOfWeek}")
                            <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6 flex justify-end">
            <button type="submit" class="admin-btn-primary">Save settings</button>
        </div>
    </form>
</div>
