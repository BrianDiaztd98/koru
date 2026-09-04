<div class="admin-form-panel" x-data="{
    charCounts: {
        term_content: 0
    },
    maxLengths: {
        term_content: 5000
    },
    updateCount(field) {
        this.charCounts[field] = this.$refs[field]?.value?.length || 0;
    }
}">
    @include('livewire.admin.partials.form-header', ['title' => 'New Term', 'backAction' => 'closeTermForm'])

    <form wire:submit.prevent="saveTerm" class="mt-6 grid gap-5 md:grid-cols-2">
        <div class="md:col-span-2">
            <label class="admin-label">Content <span class="text-rose-400">(*)</span></label>
            <textarea wire:model.defer="term_content" rows="4" x-ref="term_content" @input="updateCount('term_content')" class="admin-input" placeholder="Enter term or policy content... (max 5000 chars)"></textarea>
            <div class="mt-1.5 flex justify-between text-xs">
                <span class="text-slate-500">Required</span>
                <span class="font-mono text-slate-400" x-text="charCounts.term_content + ' / ' + maxLengths.term_content"></span>
            </div>
            @error('term_content') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="admin-label">Sort Order <span class="text-rose-400">(*)</span></label>
            <input type="number" wire:model.defer="term_sort_order" min="0" class="admin-input" placeholder="0" />
            @error('term_sort_order') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="admin-label">Status <span class="text-rose-400">(*)</span></label>
            <div class="flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
                <input id="term_active_status" type="checkbox" wire:model.defer="term_active_status" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#02B8BC] focus:ring-[#02B8BC]" />
                <label for="term_active_status" class="text-sm text-slate-300">Active</label>
            </div>
        </div>

        <div class="md:col-span-2 flex flex-wrap gap-3 pt-2">
            <button type="submit" class="admin-btn-primary">Create term</button>
            <button type="button" wire:click="closeTermForm" class="admin-btn-secondary">Discard</button>
        </div>
    </form>
</div>
