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
    @include('livewire.admin.partials.form-header', ['title' => 'Create Service'])

    <form wire:submit.prevent="save" class="mt-6 grid gap-5 md:grid-cols-2">
        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Name (EN) <span class="text-rose-400">(*)</span>
            </label>
            <input type="text" wire:model.defer="name_en" maxlength="100" class="admin-input" placeholder="e.g. Manual Therapy (max 100 chars)" />
            @error('name_en') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>
        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Description (EN) <span class="text-rose-400">(*)</span>
            </label>
            <textarea wire:model.defer="description_en" rows="4" x-ref="description_en" @input="updateCount('description_en')" class="admin-input" placeholder="Short description shown on the landing page... (max 2000 chars)"></textarea>
            <div class="mt-1.5 flex justify-between text-xs">
                <span class="text-slate-500">Required</span>
                <span class="font-mono text-slate-400" x-text="charCounts.description_en + ' / ' + maxLengths.description_en"></span>
            </div>
            @error('description_en') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Duration <span class="text-rose-400">(*)</span>
            </label>
            <input type="text" wire:model.defer="duration" maxlength="50" class="admin-input" placeholder="e.g. 60 min (max 50 chars)" />
            @error('duration') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Price <span class="text-rose-400">(*)</span>
            </label>
            <div class="relative">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-xs text-slate-500">$</span>
                <input type="number" wire:model.defer="price" step="0.01" min="0" max="999999.99" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 pl-7 pr-3 py-3 text-sm text-slate-200 outline-none focus:border-[#02B8BC]" placeholder="0.00" />
            </div>
            @error('price') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>
        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Category <span class="text-rose-400">(*)</span>
            </label>
            <select wire:model.defer="category" class="admin-select">
                @foreach($categories as $key => $label)
                    <option value="{{ $key }}">{{ $label }}</option>
                @endforeach
            </select>
            @error('category') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>
        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Image <span class="text-slate-500">(Opcional)</span>
            </label>
            @if($this->isImageCategory())
                <input type="file" wire:model="image_path" accept="image/jpeg,image/png,image/webp" class="w-full text-sm text-slate-400 file:mr-3 file:rounded-md file:border-0 file:bg-[#02B8BC]/10 file:px-3 file:py-2 file:text-sm file:font-semibold file:text-[#02B8BC]" />
                <p class="mt-1 text-[11px] text-slate-600">JPG, PNG, WebP • Max 2MB</p>
                @error('image_path') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
            @else
                <div class="rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3 text-sm text-slate-400">This category does not use images.</div>
            @endif
        </div>
        <div class="md:col-span-2 flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
            <input id="service_active_status" type="checkbox" wire:model.defer="active_status" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#02B8BC] focus:ring-[#02B8BC]" />
            <label for="service_active_status" class="text-sm text-slate-300">Publish this service</label>
        </div>

        <div class="md:col-span-2 flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
            <input id="service_discount_eligible" type="checkbox" wire:model.defer="discount_eligible" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#02B8BC] focus:ring-[#02B8BC]" />
            <label for="service_discount_eligible" class="text-sm text-slate-300">Active for deposits</label>
        </div>

        <div class="md:col-span-2 flex flex-wrap gap-3 pt-2">
            <button type="submit" class="admin-btn-primary">Create service</button>
            <button type="button" wire:click="closeForm" class="admin-btn-secondary">Discard</button>
        </div>
    </form>
</div>



