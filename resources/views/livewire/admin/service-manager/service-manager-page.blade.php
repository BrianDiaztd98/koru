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
                        @foreach($categories as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </label>

                <button type="button" wire:click="openCreateForm" class="admin-btn-primary">New Service</button>
            </div>

            @include('livewire.admin.partials.success-alert')

            @php
                $showFeaturedColumn = ! in_array($filterCategory, ['iv_therapy', 'booster_shots'], true);
                $serviceTableGrid = $showFeaturedColumn
                    ? 'grid-cols-[1.2fr_0.8fr_0.6fr_0.5fr_0.5fr_0.6fr_0.4fr]'
                    : 'grid-cols-[1.2fr_0.8fr_0.6fr_0.6fr_0.4fr]';
            @endphp

            <div class="admin-table-shell">
                <div class="admin-table-head {{ $serviceTableGrid }}">
                    <span>Name</span>
                    <span>Category</span>
                    <span>Price</span>
                    @if($showFeaturedColumn)
                        <span>Featured</span>
                        <span>Most Seller</span>
                    @endif
                    <span>Duration</span>
                    <span class="text-right">Actions</span>
                </div>
                @forelse($services as $service)
                    <div class="admin-table-row {{ $serviceTableGrid }}">
                        <div>
                            <p class="font-semibold text-white">{{ $service->name_en }}</p>
                            <p class="mt-1 text-xs text-slate-500">{{ Str::limit($service->description_en, 80) }}</p>
                        </div>
                        <div class="text-slate-400">{{ $service->category_label }}</div>
                        <div class="font-mono text-white">${{ number_format($service->price, 2) }}</div>
                        @if($showFeaturedColumn)
                            <div>
                                @if(!$this->canFeatureCategory($service->category))
                                    <span class="text-slate-600">—</span>
                                @elseif($service->is_featured)
                                    <span class="inline-flex items-center rounded-full border border-[#02B8BC]/20 bg-[#02B8BC]/10 px-2.5 py-1 text-xs font-semibold text-[#02B8BC]">Yes</span>
                                @else
                                    <span class="text-slate-500">—</span>
                                @endif
                            </div>
                            <div>
                                @if($service->is_featured && $service->is_best_seller)
                                    <span class="inline-flex items-center rounded-full border border-amber-400/20 bg-amber-400/10 px-2.5 py-1 text-xs font-semibold text-amber-300">Yes</span>
                                @else
                                    <span class="text-slate-500">—</span>
                                @endif
                            </div>
                        @endif
                        <div>{{ $service->duration }}</div>
                        <div class="flex justify-end gap-2">
                            @if($showFeaturedColumn && $this->canFeatureCategory($service->category))
                                <button type="button" wire:click="toggleFeatured({{ $service->id }})"
                                    class="admin-btn-ghost p-2 {{ $service->is_featured ? 'text-amber-400' : 'hover:text-amber-400' }}"
                                    title="{{ $service->is_featured ? 'Remove featured' : 'Set as featured' }}"
                                    aria-label="{{ $service->is_featured ? 'Remove featured' : 'Set as featured' }}">
                                    <svg class="h-4 w-4" fill="{{ $service->is_featured ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </button>
                                @if($service->is_featured)
                                    <button type="button" wire:click="toggleBestSeller({{ $service->id }})"
                                        class="admin-btn-ghost p-2 {{ $service->is_best_seller ? 'text-amber-300' : 'hover:text-amber-300' }}"
                                        title="{{ $service->is_best_seller ? 'Remove Most Seller' : 'Set as Most Seller' }}"
                                        aria-label="{{ $service->is_best_seller ? 'Remove Most Seller' : 'Set as Most Seller' }}">
                                        <svg class="h-4 w-4" fill="{{ $service->is_best_seller ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </button>
                                @endif
                            @endif
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
