<div class="admin-form-panel" x-data="{ 
    charCounts: {
        description: 0
    },
    maxLengths: {
        description: 500
    },
    updateCount(field) {
        this.charCounts[field] = this.$refs[field]?.value?.length || 0;
    }
}">
    @include('livewire.admin.partials.form-header', ['title' => 'Edit Slide'])

    <form wire:submit.prevent="save" class="grid gap-5 md:grid-cols-2 mt-6">
        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Badge <span class="text-rose-400">(*)</span>
            </label>
            <input type="text" wire:model.defer="badge" maxlength="50" class="admin-input font-mono" placeholder="DATA_TAG (max 50 chars)" />
            @error('badge') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Title Line 1 <span class="text-rose-400">(*)</span>
            </label>
            <input type="text" wire:model.defer="title_line_1" maxlength="100" class="admin-input" placeholder="Primary line text... (max 100 chars)" />
            @error('title_line_1') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Title Line 2 <span class="text-rose-400">(*)</span>
            </label>
            <input type="text" wire:model.defer="title_line_2" maxlength="100" class="admin-input" placeholder="Secondary line text... (max 100 chars)" />
            @error('title_line_2') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Description <span class="text-rose-400">(*)</span>
            </label>
            <textarea wire:model.defer="description" rows="3" x-ref="description" @input="updateCount('description')" class="admin-input" placeholder="Core description text (max 500 chars)"></textarea>
            <div class="mt-1.5 flex justify-between text-xs">
                <span class="text-slate-500">Required</span>
                <span class="font-mono text-slate-400" x-text="charCounts.description + ' / ' + maxLengths.description"></span>
            </div>
            @error('description') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Primary Button Text <span class="text-rose-400">(*)</span>
            </label>
            <input type="text" wire:model.defer="btn_primary_text" maxlength="50" class="admin-input" placeholder="e.g. Contactar por WhatsApp (max 50 chars)" />
            @error('btn_primary_text') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Primary Button URL <span class="text-rose-400">(*)</span>
            </label>
            <input type="url" wire:model.defer="btn_primary_url" maxlength="2048" class="admin-input font-mono" placeholder="https://wa.me/..." />
            @error('btn_primary_url') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Secondary Button Text <span class="text-slate-500">(Opcional)</span>
            </label>
            <input type="text" wire:model.defer="btn_secondary_text" maxlength="50" class="admin-input" placeholder="e.g. Ver más información (max 50 chars)" />
            @error('btn_secondary_text') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Secondary Button URL <span class="text-slate-500">(Opcional)</span>
            </label>
            <input type="url" wire:model.defer="btn_secondary_url" maxlength="2048" class="admin-input font-mono" placeholder="https://example.com or /contacto" />
            @error('btn_secondary_url') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Linked Service <span class="text-slate-500">(Opcional)</span>
            </label>
            <select wire:model.defer="service_id" class="admin-select">
                @foreach($services as $service)
                    <option value="{{ $service['id'] }}">{{ $service['label'] }}</option>
                @endforeach
            </select>
            @error('service_id') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-2 flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
            <input id="slide_is_featured" type="checkbox" wire:model.defer="is_featured" 
                   class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#02B8BC] focus:ring-[#02B8BC]" />
            <label for="slide_is_featured" class="text-sm text-slate-300">Set as Featured (appears first in carousel)</label>
        </div>

        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Slide Image <span class="text-slate-500">(Opcional)</span>
            </label>
            <div class="rounded-xl border border-dashed border-slate-800 bg-slate-950/20 p-4 transition-colors hover:border-slate-700">
                <input type="file" wire:model="image_path" accept="image/jpeg,image/png,image/webp" 
                       class="w-full text-sm text-slate-500 file:mr-4 file:rounded-lg file:border-0 file:bg-[#02B8BC]/10 file:px-3 file:py-2 file:text-xs file:font-bold file:uppercase file:tracking-wide file:text-[#02B8BC] file:hover:bg-[#02B8BC]/20 file:cursor-pointer font-mono" />
                <p class="mt-1 text-[11px] text-slate-600">JPG, PNG, WebP • Max 4MB</p>
                @error('image_path') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="md:col-span-2 flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
            <input id="slide_is_active" type="checkbox" wire:model.defer="is_active" 
                   class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#02B8BC] focus:ring-[#02B8BC]" />
            <label for="slide_is_active" class="text-sm text-slate-300">Set Active Visibility Flag</label>
        </div>

        <div class="md:col-span-2 flex flex-wrap gap-3 pt-2">
            <button type="submit" class="admin-btn-primary">
                Update Slide
            </button>
            <button type="button" wire:click="closeForm" class="admin-btn-secondary">
                DISCARD
            </button>
        </div>
    </form>
</div>



