<?php use Illuminate\Support\Str; ?>

<div>
    <div class="lg:col-span-3 space-y-6">
        <!-- Título de ubicación actual -->
        <div class="mb-6">
            <p class="font-mono text-xs font-bold uppercase tracking-[0.24em] text-[#0EB3B9]">Services</p>
            <h1 class="mt-2 text-3xl font-extrabold text-white tracking-tight">Service Manager</h1>
            <p class="mt-2.5 max-w-2xl text-sm leading-relaxed text-slate-400">Manage clinical and sports disciplines across the public system registries.</p>
        </div>

        @unless($showForm)
            <div class="rounded-2xl border border-slate-800/80 bg-slate-900/20 backdrop-blur-xl p-6 sm:p-8 shadow-2xl shadow-black/40">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                        <label class="flex items-center gap-2 text-sm text-slate-400">
                            <span>Category</span>
                            <select wire:model.live="filterCategory" wire:key="filter-category" class="rounded-xl border border-slate-800 bg-slate-900/70 px-3 py-2 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]">
                                <option value="all">All Services</option>
                                @foreach($categories as $key => $label)
                                    <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </label>

                        <button type="button" wire:click="openCreateForm" class="inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-[#0EB3B9]/10 transition hover:bg-[#0E788D]">New Service</button>
                    </div>
                </div>

                @if (session()->has('success'))
                    <div class="mt-4 rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mt-6 overflow-hidden rounded-2xl border border-slate-800/70">
                    <div class="grid grid-cols-[1.2fr_0.8fr_0.6fr_0.6fr_0.4fr] gap-4 border-b border-slate-800/70 bg-slate-950/60 px-4 py-3 text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">
                        <span>Name</span>
                        <span>Category</span>
                        <span>Price</span>
                        <span>Duration</span>
                        <span class="text-right">Actions</span>
                    </div>
                    @forelse($services as $service)
                        <div class="grid grid-cols-[1.2fr_0.8fr_0.6fr_0.6fr_0.4fr] items-center gap-4 border-b border-slate-800/50 bg-slate-900/40 px-4 py-4 text-sm text-slate-300 last:border-b-0">
                            <div>
                                <p class="font-semibold text-white">{{ $service->name_en }}</p>
                                <p class="mt-1 text-xs text-slate-500">{{ Str::limit($service->description_en, 80) }}</p>
                            </div>
                            <div class="text-slate-400">{{ $service->category_label }}</div>
                            <div class="font-mono text-white">${{ number_format($service->price, 2) }}</div>
                            <div>{{ $service->duration }}</div>
                            <div class="flex justify-end gap-2">
                                <button type="button" wire:click="openEditForm({{ $service->id }})" class="rounded-lg border border-slate-700 bg-slate-950/70 px-3 py-2 text-xs font-semibold text-slate-300 hover:border-[#0EB3B9] hover:text-white">Edit</button>
                                <button type="button" wire:click.prevent="confirmDelete({{ $service->id }})" class="rounded-lg border border-rose-500/30 bg-rose-500/10 px-3 py-2 text-xs font-semibold text-rose-300 hover:bg-rose-500/20">Delete</button>
                            </div>
                        </div>
                    @empty
                        <div class="px-4 py-8 text-center text-sm text-slate-400">No services found.</div>
                    @endforelse
                </div>

                <div class="mt-6">
                    {{ $services->links() }}
                </div>
            </div>
        @endunless
    </div>

    @if($showForm)
        <div class="mt-6 overflow-hidden rounded-2xl border border-slate-800/70 bg-slate-900/20 p-6 sm:p-8 shadow-2xl shadow-black/10">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-white">{{ $isEdit ? 'Edit service' : 'New service' }}</h3>
                    <p class="text-sm text-slate-400">Manage service details inline without modals.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" wire:click="closeForm" class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900/60 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:border-slate-500 hover:text-white">Back</button>
                </div>
            </div>

            <form wire:submit.prevent="save" class="mt-6 grid gap-5 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Name (EN)</label>
                    <input type="text" wire:model.defer="name_en" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" />
                </div>
                <div>
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Name (ES)</label>
                    <input type="text" wire:model.defer="name_es" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" />
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Description (EN)</label>
                    <textarea wire:model.defer="description_en" rows="4" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]"></textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Description (ES)</label>
                    <textarea wire:model.defer="description_es" rows="4" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]"></textarea>
                </div>
                <div>
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Duration</label>
                    <input type="text" wire:model.defer="duration" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" />
                </div>
                <div>
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Price</label>
                    <input type="number" wire:model.defer="price" step="0.01" min="0" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" />
                </div>
                <div>
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Category</label>
                    <select wire:model.defer="category" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]">
                        @foreach($categories as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Image</label>
                    @if($this->isImageCategory())
                        <input type="file" wire:model="image_path" accept="image/*" class="w-full text-sm text-slate-400 file:mr-3 file:rounded-md file:border-0 file:bg-[#0EB3B9]/10 file:px-3 file:py-2 file:text-sm file:font-semibold file:text-[#0EB3B9]" />
                    @else
                        <div class="rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3 text-sm text-slate-400">This category does not use images.</div>
                    @endif
                </div>
                <div class="md:col-span-2 flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
                    <input id="service_active_status" type="checkbox" wire:model.defer="active_status" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#0EB3B9] focus:ring-[#0EB3B9]" />
                    <label for="service_active_status" class="text-sm text-slate-300">Publish this service</label>
                </div>

                <div class="md:col-span-2 flex flex-wrap gap-3 pt-2">
                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#0E788D]">{{ $isEdit ? 'Update service' : 'Create service' }}</button>
                    <button type="button" wire:click="closeForm" class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900/60 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:border-slate-500 hover:text-white">Discard</button>
                </div>
            </form>
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
