<?php ?>

<div>
    <div class="lg:col-span-3 space-y-6">
        <!-- Título de ubicación actual -->
        <div class="mb-6">
            <p class="font-mono text-xs font-bold uppercase tracking-[0.24em] text-[#0EB3B9]">Services</p>
            <h1 class="mt-2 text-3xl font-extrabold text-white tracking-tight">Service Manager</h1>
            <p class="mt-2.5 max-w-2xl text-sm leading-relaxed text-slate-400">Manage clinical and sports disciplines across the public system registries.</p>
        </div>

        @unless($showForm)
            <div class="admin-card">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                        <label class="flex items-center gap-2 text-sm text-slate-400">
                            <span>Category</span>
                            <select wire:model.live="filterCategory" wire:key="filter-category" class="admin-select px-3 py-2">
                                <option value="all">All Services</option>
                                @foreach($categories as $key => $label)
                                    <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </label>

                        <button type="button" wire:click="openCreateForm" class="admin-btn-primary">New Service</button>
                    </div>
                </div>

                @if (session()->has('success'))
                    <div class="mt-4 rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="admin-table-shell">
                    <div class="admin-table-head grid-cols-[1.2fr_0.8fr_0.6fr_0.4fr_0.6fr_0.4fr]">
                        <span>Name</span>
                        <span>Category</span>
                        <span>Price</span>
                        <span>Deposits</span>
                        <span>Duration</span>
                        <span class="text-right">Actions</span>
                    </div>
                    @forelse($services as $service)
                        <div class="admin-table-row grid-cols-[1.2fr_0.8fr_0.6fr_0.4fr_0.6fr_0.4fr]">
                            <div>
                                <p class="font-semibold text-white">{{ $service->name_en }}</p>
                                <p class="mt-1 text-xs text-slate-500">{{ Str::limit($service->description_en, 80) }}</p>
                            </div>
                            <div class="text-slate-400">{{ $service->category_label }}</div>
                            <div class="font-mono text-white">${{ number_format($service->price, 2) }}</div>
                            <div>
                                @if($service->discount_eligible)
                                    <span class="inline-flex items-center gap-1.5 rounded-full border border-emerald-500/20 bg-emerald-500/10 px-2.5 py-1 text-xs font-semibold text-emerald-400">Active</span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full border border-slate-700/60 bg-slate-800/60 px-2.5 py-1 text-xs font-semibold text-slate-400">—</span>
                                @endif
                            </div>
                            <div>{{ $service->duration }}</div>
                            <div class="flex justify-end gap-2">
                                <button type="button" wire:click="openEditForm({{ $service->id }})" class="admin-btn-ghost">Edit</button>
                                <button type="button" wire:click.prevent="confirmDelete({{ $service->id }})" class="admin-btn-danger">Delete</button>
                            </div>
                        </div>
                    @empty
                        <div class="admin-table-empty">No services found.</div>
                    @endforelse
                </div>

                <div class="mt-6">
                    {{ $services->links() }}
                </div>
            </div>
        @endunless
    </div>

    @if($showForm)
        @if($isEdit)
            @include('livewire.admin.service-manager.edit.service-edit-form')
        @else
            @include('livewire.admin.service-manager.create.service-create-form')
        @endif
    @endif

    @if($showDeleteModal && $serviceToDelete)
        @include('livewire.admin.service-manager.delete.service-delete-modal')
    @endif
</div>