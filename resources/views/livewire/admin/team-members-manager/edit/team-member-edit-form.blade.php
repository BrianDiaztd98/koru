<div class="admin-form-panel" x-data="{ 
    charCounts: {
        bio_en: 0
    },
    maxLengths: {
        bio_en: 1000
    },
    updateCount(field) {
        this.charCounts[field] = this.$refs[field]?.value?.length || 0;
    }
}">
    @include('livewire.admin.partials.form-header', ['title' => 'Edit Team Member'])

    <form wire:submit.prevent="save" class="grid gap-5 md:grid-cols-2 mt-6">
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Name <span class="text-rose-400">(*)</span>
            </label>
            <input type="text" wire:model.defer="name" maxlength="100" class="admin-input" placeholder="Full name (max 100 chars)" />
            @error('name') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Instagram <span class="text-slate-500">(Opcional)</span>
            </label>
            <input type="text" wire:model.defer="instagram_handle" maxlength="50" class="admin-input" placeholder="@username (max 50 chars)" />
            <p class="mt-1 text-[11px] text-slate-600">With or without @ symbol</p>
            @error('instagram_handle') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>
        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Specialty (EN) <span class="text-slate-500">(Opcional)</span>
            </label>
            <input type="text" wire:model.defer="specialty_en" maxlength="100" class="admin-input" placeholder="Professional specialty (max 100 chars)" />
            @error('specialty_en') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>
        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Bio (EN) <span class="text-slate-500">(Opcional)</span>
            </label>
            <textarea wire:model.defer="bio_en" rows="3" x-ref="bio_en" @input="updateCount('bio_en')" class="admin-input" placeholder="Professional biography (max 1000 chars)"></textarea>
            <div class="mt-1.5 flex justify-between text-xs">
                <span class="text-slate-500">Optional</span>
                <span class="font-mono text-slate-400" x-text="charCounts.bio_en + ' / ' + maxLengths.bio_en"></span>
            </div>
            @error('bio_en') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Profile Image <span class="text-slate-500">(Opcional)</span>
            </label>
            <input type="file" wire:model="image_file" accept="image/jpeg,image/png,image/webp" class="w-full text-sm text-slate-400 file:mr-3 file:rounded-md file:border-0 file:bg-[#02B8BC]/10 file:px-3 file:py-2 file:text-sm file:font-semibold file:text-[#02B8BC]" />
            <p class="mt-1 text-[11px] text-slate-600">JPG, PNG, WebP • Max 2MB</p>
            @error('image_file') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror

            @if ($this->currentImageUrl)
                <div class="mt-4 rounded-2xl border border-slate-800/70 bg-slate-950/80 p-3">
                    <p class="mb-2 text-xs uppercase tracking-[0.24em] text-slate-400">Current photo</p>
                    <img src="{{ $this->currentImageUrl }}" alt="Current team photo" class="h-32 w-full rounded-2xl object-cover" />
                </div>
            @endif
        </div>
        <div class="flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
            <input id="active_status" type="checkbox" wire:model.defer="active_status" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#02B8BC] focus:ring-[#02B8BC]" />
            <label for="active_status" class="text-sm text-slate-300">Publish on the landing page</label>
        </div>

        <div class="md:col-span-2 flex flex-wrap gap-3 pt-2">
            <button type="submit" class="admin-btn-primary">
                Save member
            </button>
            <button type="button" wire:click="closeForm" class="admin-btn-secondary">
                Discard
            </button>
        </div>
    </form>
</div>



