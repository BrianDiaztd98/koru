<div class="admin-form-panel" x-data="{
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
    @include('livewire.admin.partials.form-header', ['title' => 'Edit Package'])

    <form wire:submit.prevent="save" class="mt-6 grid gap-5 md:grid-cols-6">
        <div class="md:col-span-6">
            <label class="admin-label">Name (EN) <span class="text-rose-400">(*)</span></label>
            <input type="text" wire:model.defer="name_en" maxlength="100" class="admin-input" placeholder="e.g. Basic (max 100 chars)" />
            @error('name_en') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-6">
            <label class="admin-label">Description (EN) <span class="text-slate-500">(Opcional)</span></label>
            <textarea wire:model.defer="description_en" rows="3" x-ref="description_en" @input="updateCount('description_en')" class="admin-input" placeholder="Short description shown on the landing page... (max 2000 chars)"></textarea>
            <div class="mt-1.5 flex justify-between text-xs">
                <span class="text-slate-500">Optional</span>
                <span class="font-mono text-slate-400" x-text="charCounts.description_en + ' / ' + maxLengths.description_en"></span>
            </div>
            @error('description_en') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-2">
            <label class="admin-label">Price <span class="text-rose-400">(*)</span></label>
            <div class="relative">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-xs text-slate-500">$</span>
                <input type="number" wire:model.defer="price" step="0.01" min="0" max="999999.99" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 pl-7 pr-3 py-3 text-sm text-slate-200 outline-none focus:border-[#02B8BC]" placeholder="0.00" />
            </div>
            @error('price') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-2">
            <label class="admin-label">Sessions <span class="text-rose-400">(*)</span></label>
            <input type="number" wire:model.defer="sessions" min="1" max="100" class="admin-input" placeholder="1" />
            @error('sessions') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-2">
            <label class="admin-label">Validity <span class="text-slate-500">(Opcional)</span></label>
            <input type="text" wire:model.defer="validity" maxlength="100" class="admin-input" placeholder="e.g. Valid for 8 weeks (max 100 chars)" />
            @error('validity') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-3">
            <label class="admin-label">Sort Order <span class="text-rose-400">(*)</span></label>
            <input type="number" wire:model.defer="sort_order" min="0" class="admin-input" placeholder="0" />
            @error('sort_order') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-3">
            <label class="admin-label">Status <span class="text-rose-400">(*)</span></label>
            <div class="flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
                <input id="package_active_status" type="checkbox" wire:model.defer="active_status" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#02B8BC] focus:ring-[#02B8BC]" />
                <label for="package_active_status" class="text-sm text-slate-300">Active</label>
            </div>
        </div>

        <div class="md:col-span-6 flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
            <input id="package_discount_eligible" type="checkbox" wire:model.defer="discount_eligible" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#02B8BC] focus:ring-[#02B8BC]" />
            <label for="package_discount_eligible" class="text-sm text-slate-300">Active for deposits</label>
        </div>

        <div class="md:col-span-6 flex flex-wrap gap-3 pt-2">
            <button type="submit" class="admin-btn-primary">Update package</button>
            <button type="button" wire:click="closeForm" class="admin-btn-secondary">Discard</button>
        </div>
    </form>
</div>
