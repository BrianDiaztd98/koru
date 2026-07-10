<div class="admin-form-panel">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-white">New story</h3>
            <p class="text-sm text-slate-400">Manage client stories inline without modals.</p>
        </div>
        <div class="flex items-center gap-3">
            <button type="button" wire:click="closeForm" class="admin-btn-secondary">
                Volver
            </button>
        </div>
    </div>

    <form wire:submit.prevent="save" class="grid gap-5 md:grid-cols-2 mt-6">
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Title</label>
            <input type="text" wire:model.defer="title" class="admin-input" />
            @error('title') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Category</label>
            <select wire:model.defer="category" class="admin-select">
                <option value="lounge">Lounge</option>
                <option value="athlete">Athlete</option>
                <option value="clinical">Clinical</option>
            </select>
            @error('category') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>
        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Description</label>
            <textarea wire:model.defer="description" rows="4" class="admin-input"></textarea>
            @error('description') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Video path</label>
            <input type="text" wire:model.defer="video_path" placeholder="videos/testimonials/1.mp4" class="admin-input" />
            @error('video_path') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Upload video</label>
            <input type="file" wire:model="video_file" accept="video/*" class="w-full text-sm text-slate-400 file:mr-3 file:rounded-md file:border-0 file:bg-[#0EB3B9]/10 file:px-3 file:py-2 file:text-sm file:font-semibold file:text-[#0EB3B9]" />
            @error('video_file') <span class="mt-2 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
        </div>
        <div class="md:col-span-2 flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
            <input id="active_status" type="checkbox" wire:model.defer="active_status" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#0EB3B9] focus:ring-[#0EB3B9]" />
            <label for="active_status" class="text-sm text-slate-300">Publish on the landing page</label>
        </div>

        <div class="md:col-span-2 flex flex-wrap gap-3 pt-2">
            <button type="submit" class="admin-btn-primary">
                Save story
            </button>
            <button type="button" wire:click="closeForm" class="admin-btn-secondary">
                Discard
            </button>
        </div>
    </form>
</div>