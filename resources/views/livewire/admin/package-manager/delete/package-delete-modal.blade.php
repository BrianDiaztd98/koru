<div class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/80 p-4">
    <div class="w-full max-w-lg overflow-hidden rounded-3xl border border-slate-800/70 bg-slate-900 shadow-2xl">
        <div class="p-6">
            <h2 class="text-xl font-semibold text-white">Confirm Deletion</h2>
            <p class="mt-2 text-slate-400">Are you sure you want to permanently delete "{{ $packageToDelete->name_en }}"?</p>
            <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-end">
                <button type="button" wire:click="$set('showDeleteModal', false)" class="rounded border border-slate-700/80 px-4 py-2 text-sm text-slate-200">Cancel</button>
                <button type="button" wire:click="deleteConfirmed" class="rounded bg-red-500 px-4 py-2 text-sm font-semibold text-white">Delete</button>
            </div>
        </div>
    </div>
</div>