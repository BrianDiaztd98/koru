<div class="lg:col-span-3 space-y-6" x-data="{ activeTab: 'copy' }">
    <!-- Título de ubicación actual -->
    <div class="mb-6">
        <p class="font-mono text-xs font-bold uppercase tracking-[0.24em] text-[#0EB3B9]">About Section</p>
        <h1 class="mt-2 text-3xl font-extrabold text-white tracking-tight">{{ $about?->id ? 'Edit Content' : 'Create Content' }}</h1>
        <p class="mt-2.5 max-w-2xl text-sm leading-relaxed text-slate-400">Configure core copywriting and media structures.</p>
    </div>

    @if ($about)
        @include('livewire.admin.about-page-manager.create.about-section-create-form')
    @else
        @include('livewire.admin.about-page-manager.create.about-section-create-form')
    @endif

    @if ($showDeleteModal && $about)
        @include('livewire.admin.about-page-manager.delete.about-section-delete-modal')
    @endif
</div>