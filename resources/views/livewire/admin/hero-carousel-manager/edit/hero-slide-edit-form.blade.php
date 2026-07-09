<div class="admin-form-panel">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-white">Edit Slide</h3>
            <p class="text-sm text-slate-400">Configure slide parameters for the hero carousel.</p>
        </div>
        <button type="button" wire:click="closeForm" class="admin-btn-secondary">
            Back
        </button>
    </div>

    <form wire:submit.prevent="save" class="grid gap-5 md:grid-cols-2 mt-6">
        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Badge String</label>
            <input type="text" wire:model.defer="badge" class="admin-input font-mono" placeholder="DATA_TAG" />
            @error('badge') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>

        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Title Segment 01</label>
            <input type="text" wire:model.defer="title_line_1" class="admin-input" placeholder="Primary line text..." required />
            @error('title_line_1') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>

        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Title Segment 02</label>
            <input type="text" wire:model.defer="title_line_2" class="admin-input" placeholder="Secondary line text..." />
            @error('title_line_2') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Description Core Text</label>
            <textarea wire:model.defer="description" rows="3" class="admin-input"></textarea>
            @error('description') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>

        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Action Button 01 Text</label>
            <input type="text" wire:model.defer="btn_primary_text" class="admin-input" placeholder="e.g. Contactar por WhatsApp" required />
            @error('btn_primary_text') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>

        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Action Button 01 URL Path</label>
            <input type="text" wire:model.defer="btn_primary_url" class="admin-input font-mono" placeholder="https://wa.me/..." required />
            @error('btn_primary_url') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Action Button 02 Text (Optional)</label>
            <input type="text" wire:model.defer="btn_secondary_text" class="admin-input" placeholder="e.g. Ver más información" />
        </div>

        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Relational Service ID</label>
            <select wire:model.defer="service_id" class="admin-select">
                @foreach($services as $service)
                    <option value="{{ $service['id'] }}">{{ $service['label'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="md:col-span-2 flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
            <input id="slide_is_featured" type="checkbox" wire:model.defer="is_featured" 
                   class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#0EB3B9] focus:ring-[#0EB3B9]" />
            <label for="slide_is_featured" class="text-sm text-slate-300">Set as Featured (appears first in carousel)</label>
        </div>

        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Slide Media Asset</label>
            <div class="rounded-xl border border-dashed border-slate-800 bg-slate-950/20 p-4 transition-colors hover:border-slate-700">
                <input type="file" wire:model="image_path" accept="image/jpeg,image/png,image/webp" 
                       class="w-full text-sm text-slate-500 file:mr-4 file:rounded-lg file:border-0 file:bg-[#0EB3B9]/10 file:px-3 file:py-2 file:text-xs file:font-bold file:uppercase file:tracking-wide file:text-[#0EB3B9] file:hover:bg-[#0EB3B9]/20 file:cursor-pointer font-mono" />
                @error('image_path') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
            </div>
        </div>

        <div class="md:col-span-2 flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
            <input id="slide_is_active" type="checkbox" wire:model.defer="is_active" 
                   class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#0EB3B9] focus:ring-[#0EB3B9]" />
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