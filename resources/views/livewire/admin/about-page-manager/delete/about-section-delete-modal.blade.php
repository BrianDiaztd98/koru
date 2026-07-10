<div class="fixed inset-0 z-[9999] flex items-center justify-center bg-slate-950/80 p-4" wire:click.self="closeDeleteModal">
    <div class="w-full max-w-md overflow-hidden rounded-2xl border border-slate-800/70 bg-slate-900 shadow-2xl">
        <div class="border-b border-slate-800/70 px-6 py-5">
            <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center justify-center rounded-full bg-rose-500/10 text-rose-400 p-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </span>
                <h3 class="text-lg font-semibold text-white">DELETE_CONFIRMATION</h3>
            </div>
            <p class="text-sm text-slate-400">This action will permanently delete the About section. This operation cannot be undone. All associated media assets will be purged from storage.</p>
        </div>

        <div class="p-6">
            <div class="rounded-xl border border-slate-800/60 bg-slate-950/30 p-4 mb-6">
                <div class="flex items-center gap-2 text-xs font-mono text-slate-500 mb-2">
                    <span>TARGET_ID:</span>
                    <span class="text-rose-400 font-bold">[{{ sprintf('%02d', $about->id) }}]</span>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                <button type="button" wire:click="deleteConfirmed" 
                        class="flex-1 inline-flex items-center justify-center rounded-xl bg-rose-500/10 border border-rose-500/30 px-4 py-2.5 text-sm font-semibold text-rose-400 transition hover:bg-rose-500/20 hover:border-rose-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    CONFIRM_PURGE
                </button>
                <button type="button" wire:click="closeDeleteModal" 
                        class="flex-1 inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900/60 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:border-slate-500 hover:text-white">
                    ABORT
                </button>
            </div>
        </div>
    </div>
</div>