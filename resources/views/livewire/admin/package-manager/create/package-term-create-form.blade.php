<div class="mt-6 overflow-hidden rounded-2xl border border-slate-800/70 bg-slate-900/20 p-6 sm:p-8 shadow-2xl shadow-black/10">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-white">New term</h3>
            <p class="text-sm text-slate-400">Manage package terms and policies inline without modals.</p>
        </div>
        <div class="flex items-center gap-3">
            <button type="button" wire:click="closeTermForm" class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900/60 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:border-slate-500 hover:text-white">Back</button>
        </div>
    </div>

    <form wire:submit.prevent="saveTerm" class="mt-6 grid gap-5">
        <div class="flex flex-col gap-1.5">
            <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Content</label>
            <textarea wire:model.defer="term_content" rows="4" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="Enter term or policy content..."></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Sort Order</label>
                <input type="number" wire:model.defer="term_sort_order" min="0" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="0" />
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Status</label>
                <label class="inline-flex items-center gap-2 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3 text-sm text-slate-300 cursor-pointer">
                    <input type="checkbox" wire:model.defer="term_active_status" class="rounded" />
                    <span>Active</span>
                </label>
            </div>
        </div>

        <div class="flex flex-wrap gap-3 pt-2">
            <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#0E788D]">Create term</button>
            <button type="button" wire:click="closeTermForm" class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900/60 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:border-slate-500 hover:text-white">Discard</button>
        </div>
    </form>
</div>