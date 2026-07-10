<div class="mt-6 overflow-hidden rounded-2xl border border-slate-800/70 bg-slate-900/20 p-6 sm:p-8 shadow-2xl shadow-black/10">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-white">Edit package</h3>
            <p class="text-sm text-slate-400">Manage package details inline without modals.</p>
        </div>
        <div class="flex items-center gap-3">
            <button type="button" wire:click="closeForm" class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900/60 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:border-slate-500 hover:text-white">Back</button>
        </div>
    </div>

    <form wire:submit.prevent="save" class="mt-6 grid gap-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2 flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Name (EN)</label>
                <input type="text" wire:model.defer="name_en" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="e.g. Basic" />
            </div>
            <div class="md:col-span-2 flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Description (EN)</label>
                <textarea wire:model.defer="description_en" rows="3" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="Short description shown on the landing page..."></textarea>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Price</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-xs text-slate-500">$</span>
                    <input type="number" wire:model.defer="price" step="0.01" min="0" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 pl-7 pr-3 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="0.00" />
                </div>
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Sessions</label>
                <input type="number" wire:model.defer="sessions" min="1" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="1" />
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Validity</label>
                <input type="text" wire:model.defer="validity" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="e.g. Valid for 8 weeks" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Sort Order</label>
                <input type="number" wire:model.defer="sort_order" min="0" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="0" />
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Status</label>
                <label class="inline-flex items-center gap-2 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3 text-sm text-slate-300 cursor-pointer">
                    <input type="checkbox" wire:model.defer="active_status" class="rounded" />
                    <span>Active</span>
                </label>
            </div>
        </div>

        <div class="flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
            <input id="package_discount_eligible" type="checkbox" wire:model.defer="discount_eligible" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#0EB3B9] focus:ring-[#0EB3B9]" />
            <label for="package_discount_eligible" class="text-sm text-slate-300">Active for deposits</label>
        </div>

        <div class="flex flex-wrap gap-3 pt-2">
            <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#0E788D]">Update package</button>
            <button type="button" wire:click="closeForm" class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900/60 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:border-slate-500 hover:text-white">Discard</button>
        </div>
    </form>
</div>