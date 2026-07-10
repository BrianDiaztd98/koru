<div class="fixed inset-0 z-[9999] flex items-center justify-center bg-slate-950/80 p-4">
    <div class="w-full max-w-xl overflow-hidden rounded-3xl border border-slate-800/70 bg-slate-900 shadow-2xl">
        <div class="border-b border-slate-800/70 px-6 py-5">
            <h3 class="text-lg font-semibold text-white">Confirm deletion</h3>
            <p class="mt-1 text-sm text-slate-400">This action cannot be undone. The team member will be permanently removed.</p>
        </div>

        <div class="p-6">
            <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                <button type="button" wire:click="deleteConfirmed" class="inline-flex items-center justify-center rounded-xl bg-rose-500 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-rose-600">
                    Delete member
                </button>
                <button type="button" wire:click="$set('showDeleteModal', false)" class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900/70 px-4 py-2.5 text-sm font-semibold text-slate-200 transition hover:border-slate-500 hover:text-white">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>