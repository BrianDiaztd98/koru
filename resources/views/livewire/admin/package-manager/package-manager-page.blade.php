<?php ?>

<div>
    <div class="lg:col-span-3 space-y-6">
        <!-- Título de ubicación actual -->
        <div class="mb-6">
            <p class="font-mono text-xs font-bold uppercase tracking-[0.24em] text-[#0EB3B9]">Packages</p>
            <h1 class="mt-2 text-3xl font-extrabold text-white tracking-tight">Package Manager</h1>
            <p class="mt-2.5 max-w-2xl text-sm leading-relaxed text-slate-400">Manage therapeutic packages and terms for booking on the public portal.</p>
        </div>

        @unless($showForm || $showTermForm)
            <div class="admin-card">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <h3 class="text-lg font-semibold text-white">Active Packages</h3>

                    <button type="button" wire:click="openCreateForm" class="admin-btn-primary">New Package</button>
                </div>

                @if (session()->has('success'))
                    <div class="mt-4 rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="admin-table-shell">
                    <div class="admin-table-head grid-cols-[1.2fr_0.5fr_0.6fr_0.4fr_0.5fr_0.5fr]">
                        <span>Name</span>
                        <span>Sessions</span>
                        <span>Price</span>
                        <span>Deposits</span>
                        <span>Validity</span>
                        <span class="text-right">Actions</span>
                    </div>
                    @forelse($packages as $package)
                        <div class="admin-table-row grid-cols-[1.2fr_0.5fr_0.6fr_0.4fr_0.5fr_0.5fr]">
                            <div>
                                <p class="font-semibold text-white">{{ $package->name_en }}</p>
                                <p class="mt-1 text-xs text-slate-500">{{ Str::limit($package->description_en, 90) }}</p>
                            </div>
                            <div>
                                <span class="inline-flex items-center rounded-full bg-slate-900/80 px-2 py-1 text-xs text-slate-300">{{ $package->sessions }}</span>
                            </div>
                            <div class="font-mono text-white">${{ number_format($package->price, 2) }}</div>
                            <div>
                                @if($package->discount_eligible)
                                    <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-500/20 bg-emerald-500/10 px-2.5 py-1 text-xs font-semibold text-emerald-400">Active</span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full border border-slate-700/60 bg-slate-800/60 px-2.5 py-1 text-xs font-semibold text-slate-400">—</span>
                                @endif
                            </div>
                            <div class="text-slate-400">{{ $package->validity ?? '—' }}</div>
                            <div class="flex justify-end gap-2">
                                <button type="button" wire:click="openEditForm({{ $package->id }})" class="admin-btn-ghost">Edit</button>
                                <button type="button" wire:click.prevent="confirmDelete({{ $package->id }})" class="admin-btn-danger">Delete</button>
                            </div>
                        </div>
                    @empty
                        <div class="admin-table-empty">No packages found. Create your first package to get started.</div>
                    @endforelse
                </div>

                <div class="mt-6">
                    {{ $packages->links() }}
                </div>
            </div>

            <div class="admin-card">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <h3 class="text-lg font-semibold text-white">Terms & Policies</h3>
                    <button type="button" wire:click="openCreateTermModal" class="admin-btn-primary px-3 py-1.5">New Term</button>
                </div>

                <div class="admin-table-shell mt-4">
                    <div class="admin-table-head grid-cols-[1.7fr_0.35fr_0.45fr_0.45fr]">
                        <span>Content</span>
                        <span>Sort</span>
                        <span>Status</span>
                        <span class="text-right">Actions</span>
                    </div>

                    @forelse($terms as $term)
                        <div wire:key="term-{{ $term['id'] }}" class="admin-table-row grid-cols-[1.7fr_0.35fr_0.45fr_0.45fr]">
                            <div class="text-slate-200">{{ Str::limit($term['content'], 120) }}</div>
                            <div class="text-slate-400">{{ $term['sort_order'] }}</div>
                            <div>
                                @if($term['active_status'])
                                    <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-500/20 bg-emerald-500/10 px-2.5 py-1 text-xs font-semibold text-emerald-400">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full border border-slate-700/60 bg-slate-800/60 px-2.5 py-1 text-xs font-semibold text-slate-400">
                                        <span class="h-1.5 w-1.5 rounded-full bg-slate-500"></span>
                                        Inactive
                                    </span>
                                @endif
                            </div>
                            <div class="flex justify-end gap-2">
                                <button type="button" wire:click="openEditTermModal({{ $term['id'] }})" class="admin-btn-ghost">Edit</button>
                                <button type="button" wire:click.prevent="confirmDeleteTerm({{ $term['id'] }})" class="admin-btn-danger">Delete</button>
                            </div>
                        </div>
                    @empty
                        <div class="admin-table-empty">No terms found. Create your first term to get started.</div>
                    @endforelse
                </div>
            </div>
        @endunless
    </div>

    @if($showForm)
        @if($isEdit)
            @include('livewire.admin.package-manager.edit.package-edit-form')
        @else
            @include('livewire.admin.package-manager.create.package-create-form')
        @endif
    @endif

    @if($showDeleteModal && $packageToDelete)
        @include('livewire.admin.package-manager.delete.package-delete-modal')
    @endif

    @if($showTermForm)
        @if($termToEdit)
            @include('livewire.admin.package-manager.edit.package-term-edit-form')
        @else
            @include('livewire.admin.package-manager.create.package-term-create-form')
        @endif
    @endif

    @if($showDeleteModal && $termToEdit)
        @include('livewire.admin.package-manager.delete.package-term-delete-modal')
    @endif
</div>