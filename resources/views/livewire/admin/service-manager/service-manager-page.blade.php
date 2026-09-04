<div class="space-y-6">
    @include('livewire.admin.partials.page-header', [
        'eyebrow' => 'Commercial Offer',
        'title' => 'Service Manager',
        'description' => 'Manage clinical and sports disciplines across the public system registries.',
    ])

    @unless($showForm)
        <div class="admin-card">
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

            @include('livewire.admin.partials.success-alert')

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

    @if($showForm)
        @if($isEdit)
            @include('livewire.admin.service-manager.edit.service-edit-form')
        @else
            @include('livewire.admin.service-manager.create.service-create-form')
        @endif
    @endif

    @if($showDeleteModal && $serviceToDelete)
        @include('livewire.admin.partials.delete-modal', [
            'title' => 'Delete service',
            'entity' => $serviceToDelete->name_en,
            'confirmAction' => 'deleteConfirmed',
            'cancelAction' => '$set(\'showDeleteModal\', false)',
        ])
    @endif
</div>
