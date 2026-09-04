{{--
    Encabezado estándar de formularios administrativos (título + botón volver).
    Uso: @include('livewire.admin.partials.form-header', ['title' => '...', 'backAction' => 'closeForm'])
--}}
<div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <h3 class="text-lg font-semibold text-white">{{ $title }}</h3>
    <button type="button" wire:click="{{ $backAction ?? 'closeForm' }}" class="admin-btn-secondary">Back</button>
</div>
