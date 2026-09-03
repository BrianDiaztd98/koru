<div class="mt-6 overflow-hidden rounded-2xl border border-slate-800/70 bg-slate-900/20 p-6 sm:p-8 shadow-2xl shadow-black/10" x-data="{ 
    charCounts: {
        description_en: 0
    },
    maxLengths: {
        description_en: 2000
    },
    updateCount(field) {
        this.charCounts[field] = this.$refs[field]?.value?.length || 0;
    }
}">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-white">New Package</h3>
            <p class="text-sm text-slate-400">Manage therapeutic packages and terms for booking on the public portal.</p>
        </div>
        <div class="flex items-center gap-3">
            <button type="button" wire:click="closeForm" class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900/60 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:border-slate-500 hover:text-white">Back</button>
        </div>
    </div>

    <form wire:submit.prevent="save" class="mt-6 grid gap-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2 flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                    Name (EN) <span class="text-rose-400">(*)</span>
                </label>
                <input type="text" wire:model.defer="name_en" maxlength="100" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#02B8BC]" placeholder="e.g. Basic (max 100 chars)" />
                @error('name_en') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
            </div>
            <div class="md:col-span-2 flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                    Description (EN) <span class="text-slate-500">(Opcional)</span>
                </label>
                <textarea wire:model.defer="description_en" rows="3" x-ref="description_en" @input="updateCount('description_en')" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#02B8BC]" placeholder="Short description shown on the landing page... (max 2000 chars)"></textarea>
                <div class="mt-1.5 flex justify-between text-xs">
                    <span class="text-slate-500">Optional</span>
                    <span class="font-mono text-slate-400" x-text="charCounts.description_en + ' / ' + maxLengths.description_en"></span>
                </div>
                @error('description_en') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                    Price <span class="text-rose-400">(*)</span>
                </label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-xs text-slate-500">$</span>
                    <input type="number" wire:model.defer="price" step="0.01" min="0" max="999999.99" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 pl-7 pr-3 py-3 text-sm text-slate-200 outline-none focus:border-[#02B8BC]" placeholder="0.00" />
                </div>
                @error('price') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                    Sessions <span class="text-rose-400">(*)</span>
                </label>
                <input type="number" wire:model.defer="sessions" min="1" max="100" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#02B8BC]" placeholder="1" />
                @error('sessions') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                    Validity <span class="text-slate-500">(Opcional)</span>
                </label>
                <input type="text" wire:model.defer="validity" maxlength="100" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#02B8BC]" placeholder="e.g. Valid for 8 weeks (max 100 chars)" />
                @error('validity') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                    Sort Order <span class="text-rose-400">(*)</span>
                </label>
                <input type="number" wire:model.defer="sort_order" min="0" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#02B8BC]" placeholder="0" />
                @error('sort_order') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                    Status <span class="text-rose-400">(*)</span>
                </label>
                <label class="inline-flex items-center gap-2 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3 text-sm text-slate-300 cursor-pointer">
                    <input type="checkbox" wire:model.defer="active_status" class="rounded" />
                    <span>Active</span>
                </label>
            </div>
        </div>

        <div class="flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
            <input id="package_discount_eligible" type="checkbox" wire:model.defer="discount_eligible" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#02B8BC] focus:ring-[#02B8BC]" />
            <label for="package_discount_eligible" class="text-sm text-slate-300">Active for deposits</label>
        </div>

        <div class="flex flex-wrap gap-3 pt-2">
            <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-[#02B8BC] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#037E93]">Create package</button>
            <button type="button" wire:click="closeForm" class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900/60 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:border-slate-500 hover:text-white">Discard</button>
        </div>
    </form>
</div>



