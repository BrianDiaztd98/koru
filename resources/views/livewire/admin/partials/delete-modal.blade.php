{{--
    Modal de confirmación de borrado estándar del panel administrativo.
    Uso: @include('livewire.admin.partials.delete-modal', [
        'title' => 'Delete service',
        'entity' => $serviceToDelete->name_en,
        'confirmAction' => 'deleteConfirmed',
        'cancelAction' => "$set('showDeleteModal', false)",
    ])
--}}
<div class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/80 p-4" wire:click.self="{{ $cancelAction }}">
    <div class="w-full max-w-md rounded-2xl border border-slate-800/70 bg-slate-900 shadow-2xl">
        <div class="border-b border-slate-800/70 px-6 py-5">
            <h3 class="text-lg font-semibold text-white">{{ $title }}</h3>
            <p class="mt-1 text-sm text-slate-400">
                Are you sure you want to permanently delete <span class="font-semibold text-white">{{ $entity }}</span>? This action cannot be undone.
            </p>
        </div>

        <div class="flex flex-col gap-3 p-6 sm:flex-row sm:justify-end">
            <button type="button" wire:click="{{ $cancelAction }}" class="admin-btn-secondary">Cancel</button>
            <button type="button" wire:click="{{ $confirmAction }}"
                    class="inline-flex items-center justify-center rounded-xl border border-rose-500/30 bg-rose-500/10 px-4 py-2.5 text-sm font-semibold text-rose-300 transition hover:bg-rose-500/20 hover:border-rose-500/50">
                Delete
            </button>
        </div>
    </div>
</div>
