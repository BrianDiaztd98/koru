<div class="admin-form-panel">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-white">New service</h3>
            <p class="text-sm text-slate-400">Manage service details inline without modals.</p>
        </div>
        <div class="flex items-center gap-3">
            <button type="button" wire:click="closeForm" class="admin-btn-secondary">Back</button>
        </div>
    </div>

    <form wire:submit.prevent="save" class="mt-6 grid gap-5 md:grid-cols-2">
        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Name (EN)</label>
            <input type="text" wire:model.defer="name_en" class="admin-input" />
            @error('name_en') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>
        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Description (EN)</label>
            <textarea wire:model.defer="description_en" rows="4" class="admin-input"></textarea>
            @error('description_en') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Duration</label>
            <input type="text" wire:model.defer="duration" class="admin-input" />
            @error('duration') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Price</label>
            <input type="number" wire:model.defer="price" step="0.01" min="0" class="admin-input" />
            @error('price') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>
        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Category</label>
            <select wire:model.defer="category" class="admin-select">
                @foreach($categories as $key => $label)
                    <option value="{{ $key }}">{{ $label }}</option>
                @endforeach
            </select>
            @error('category') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>
        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Image</label>
            @if($this->isImageCategory())
                <input type="file" wire:model="image_path" accept="image/*" class="w-full text-sm text-slate-400 file:mr-3 file:rounded-md file:border-0 file:bg-[#0EB3B9]/10 file:px-3 file:py-2 file:text-sm file:font-semibold file:text-[#0EB3B9]" />
                @error('image_path') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
            @else
                <div class="rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3 text-sm text-slate-400">This category does not use images.</div>
            @endif
        </div>
        <div class="md:col-span-2 flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
            <input id="service_active_status" type="checkbox" wire:model.defer="active_status" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#0EB3B9] focus:ring-[#0EB3B9]" />
            <label for="service_active_status" class="text-sm text-slate-300">Publish this service</label>
        </div>

        <div class="md:col-span-2 flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
            <input id="service_discount_eligible" type="checkbox" wire:model.defer="discount_eligible" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#0EB3B9] focus:ring-[#0EB3B9]" />
            <label for="service_discount_eligible" class="text-sm text-slate-300">Active for deposits</label>
        </div>

        <div class="md:col-span-2 flex flex-wrap gap-3 pt-2">
            <button type="submit" class="admin-btn-primary">Create service</button>
            <button type="button" wire:click="closeForm" class="admin-btn-secondary">Discard</button>
        </div>
    </form>
</div>