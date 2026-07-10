<div class="admin-form-panel">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-white">New member</h3>
            <p class="text-sm text-slate-400">Manage team profiles inline without modals.</p>
        </div>
        <div class="flex items-center gap-3">
            <button type="button" wire:click="closeForm" class="admin-btn-secondary">
                Volver
            </button>
        </div>
    </div>

    <form wire:submit.prevent="save" class="grid gap-5 md:grid-cols-2 mt-6">
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Name</label>
            <input type="text" wire:model.defer="name" class="admin-input" />
            @error('name') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Instagram</label>
            <input type="text" wire:model.defer="instagram_handle" class="admin-input" />
            @error('instagram_handle') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>
        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Specialty (EN)</label>
            <input type="text" wire:model.defer="specialty_en" class="admin-input" />
            @error('specialty_en') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>
        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Bio (EN)</label>
            <textarea wire:model.defer="bio_en" rows="3" class="admin-input"></textarea>
            @error('bio_en') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Profile image</label>
            <input type="file" wire:model="image_file" accept="image/*" class="w-full text-sm text-slate-400 file:mr-3 file:rounded-md file:border-0 file:bg-[#0EB3B9]/10 file:px-3 file:py-2 file:text-sm file:font-semibold file:text-[#0EB3B9]" />
            @error('image_file') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>
        <div class="flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
            <input id="active_status" type="checkbox" wire:model.defer="active_status" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#0EB3B9] focus:ring-[#0EB3B9]" />
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