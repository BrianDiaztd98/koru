<?php ?>

<div class="lg:col-span-3 space-y-6">
    <!-- Título de ubicación actual -->
    <div class="mb-6">
        <p class="font-mono text-xs font-bold uppercase tracking-[0.24em] text-[#0EB3B9]">Client Outcomes</p>
        <h1 class="mt-2 text-3xl font-extrabold text-white tracking-tight">Client Outcomes</h1>
        <p class="mt-2.5 max-w-2xl text-sm leading-relaxed text-slate-400">Manage the stories shown in the landing page section.</p>
    </div>

    @unless($showForm)
        <div class="admin-card">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <button type="button" wire:click="openCreateForm" class="admin-btn-primary">
                    Create a new outcome story
                </button>
            </div>

            @if (session()->has('success'))
                <div class="mt-4 rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                    {{ session('success') }}
                </div>
            @endif

            <div class="admin-table-shell">
                <div class="admin-table-head grid-cols-[1.4fr_1fr_0.5fr]">
                    <span>Story</span>
                    <span>Category</span>
                    <span class="text-right">Actions</span>
                </div>
                @forelse ($testimonials as $testimonial)
                    <div class="admin-table-row grid-cols-[1.4fr_1fr_0.5fr]">
                        <div>
                            <p class="font-semibold text-white">{{ $testimonial->title }}</p>
                            <p class="mt-1 text-xs text-slate-500">{{ Str::limit($testimonial->description, 90) }}</p>
                        </div>
                        <div class="capitalize text-slate-400">{{ $testimonial->category }}</div>
                        <div class="flex justify-end gap-2">
                            <button type="button" wire:click="openEditForm({{ $testimonial->id }})" class="admin-btn-ghost">Edit</button>
                            <button type="button" wire:click.prevent="confirmDelete({{ $testimonial->id }})" class="admin-btn-danger">Delete</button>
                        </div>
                    </div>
                @empty
                    <div class="admin-table-empty">No client outcomes yet.</div>
                @endforelse
            </div>
        </div>
    @endunless

    @if ($showForm)
        @if ($testimonial)
            @include('livewire.admin.client-outcome-manager.edit.client-outcome-edit-form')
        @else
            @include('livewire.admin.client-outcome-manager.create.client-outcome-create-form')
        @endif
    @endif

    @if ($showDeleteModal && $testimonial)
        @include('livewire.admin.client-outcome-manager.delete.client-outcome-delete-modal')
    @endif
</div>



