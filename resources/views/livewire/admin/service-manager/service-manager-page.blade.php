<div>
    <div class="lg:col-span-3 space-y-6">
        <div class="rounded-2xl border border-slate-800/80 bg-slate-900/40 p-6 shadow-xl">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h3 class="text-lg font-semibold">Services{{ $filterCategory !== 'all' ? ' — '.$categories[$filterCategory] : '' }}</h3>

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                    <label class="flex items-center gap-2 text-sm text-slate-400">
                        <span>Category</span>
                        <select wire:model="filterCategory" class="rounded bg-slate-950/60 px-3 py-2 text-sm">
                            <option value="all">All Services</option>
                            @foreach($categories as $key => $label)
                                <option value="{{ $key }}">{{ $label }}</option>
                            @endforeach
                        </select>
                    </label>

                    <button type="button" wire:click="openCreateModal" class="inline-flex items-center gap-2 rounded-lg bg-[#0EB3B9] px-3 py-1 text-xs font-semibold text-white">New</button>
                </div>
            </div>

            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-700 text-sm">
                    <thead class="bg-slate-950/80 text-slate-300">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold">Name</th>
                            <th class="px-4 py-3 text-left font-semibold">Category</th>
                            <th class="px-4 py-3 text-left font-semibold">Price</th>
                            <th class="px-4 py-3 text-left font-semibold">Duration</th>
                            <th class="px-4 py-3 text-left font-semibold">Status</th>
                            <th class="px-4 py-3 text-right font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800 text-slate-300">
                        @forelse($services as $service)
                            <tr class="bg-slate-950/40">
                                <td class="px-4 py-3">
                                    <div class="font-semibold">{{ $service->name_en }}</div>
                                    <div class="text-xs text-slate-500">{{ Str::limit($service->description_en, 80) }}</div>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex rounded-full bg-slate-900/80 px-2 py-1 text-xs text-slate-300">{{ $service->category_label }}</span>
                                </td>
                                <td class="px-4 py-3">${{ number_format($service->price, 2) }}</td>
                                <td class="px-4 py-3">{{ $service->duration }}</td>
                                <td class="px-4 py-3">{{ $service->active_status ? 'Active' : 'Inactive' }}</td>
                                <td class="px-4 py-3 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <button type="button" wire:click="openEditModal({{ $service->id }})" class="text-xs text-slate-300 bg-slate-900/40 px-3 py-1 rounded">Edit</button>
                                        <button type="button" wire:click.prevent="confirmDelete({{ $service->id }})" class="text-xs text-red-400">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-6 text-center text-slate-500">No services found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $services->links() }}
            </div>
        </div>
    </div>

    @if($showFormModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/80 p-4">
            <div class="w-full max-w-3xl overflow-hidden rounded-3xl border border-slate-800/70 bg-slate-900 shadow-2xl">
                <div class="flex items-center justify-between border-b border-slate-800/70 px-6 py-4">
                    <div>
                        <h2 class="text-xl font-semibold text-white">{{ $isEdit ? 'Edit Service' : 'Create Service' }}</h2>
                        <p class="text-sm text-slate-400">Use the modal to manage a service without leaving the service index.</p>
                    </div>
                    <button type="button" wire:click="closeFormModal" class="rounded-full border border-slate-700/80 bg-slate-950/80 px-3 py-2 text-sm text-slate-200 hover:bg-slate-900">Close</button>
                </div>

                <div class="p-6">
                    <form wire:submit.prevent="save" class="grid gap-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" wire:model.defer="name_en" placeholder="Name (EN)" class="rounded px-3 py-2 bg-slate-950/60" />
                            <input type="text" wire:model.defer="name_es" placeholder="Name (ES)" class="rounded px-3 py-2 bg-slate-950/60" />
                        </div>

                        <textarea wire:model.defer="description_en" rows="4" placeholder="Description (EN)" class="rounded px-3 py-2 bg-slate-950/60"></textarea>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <input type="text" wire:model.defer="duration" placeholder="Duration" class="rounded px-3 py-2 bg-slate-950/60" />
                            <input type="number" wire:model.defer="price" placeholder="Price" class="rounded px-3 py-2 bg-slate-950/60" step="0.01" />
                            <label class="flex flex-col gap-2 text-sm text-slate-400">
                                <span>Category</span>
                                <select wire:model.defer="category" class="rounded bg-slate-950/60 px-3 py-2 text-sm">
                                    @foreach($categories as $key => $label)
                                        <option value="{{ $key }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>

                        @if($this->isImageCategory())
                            <div>
                                <input type="file" wire:model="image_path" accept="image/*" class="w-full text-sm text-slate-400" />
                            </div>
                        @else
                            <div class="rounded-2xl border border-slate-800/70 bg-slate-950/80 px-4 py-3 text-sm text-slate-400">
                                This category does not use images.
                            </div>
                        @endif

                        <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                            <button type="button" wire:click="closeFormModal" class="rounded border border-slate-700/80 px-4 py-2 text-sm text-slate-200">Cancel</button>
                            <button type="submit" class="rounded bg-[#0EB3B9] px-4 py-2 text-sm font-semibold text-white">{{ $isEdit ? 'Update Service' : 'Create Service' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if($showDeleteModal && $serviceToDelete)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/80 p-4">
            <div class="w-full max-w-lg overflow-hidden rounded-3xl border border-slate-800/70 bg-slate-900 shadow-2xl">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-white">Confirm Deletion</h2>
                    <p class="mt-2 text-slate-400">Are you sure you want to permanently delete "{{ $serviceToDelete->name_en }}"?</p>
                    <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-end">
                        <button type="button" wire:click="$set('showDeleteModal', false)" class="rounded border border-slate-700/80 px-4 py-2 text-sm text-slate-200">Cancel</button>
                        <button type="button" wire:click="deleteConfirmed" class="rounded bg-red-500 px-4 py-2 text-sm font-semibold text-white">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
