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
        <div class="mt-6 overflow-hidden rounded-2xl border border-slate-800/70 bg-slate-900/20 p-6 sm:p-8 shadow-2xl shadow-black/10">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-white">{{ $isEdit ? 'Edit package' : 'New package' }}</h3>
                    <p class="text-sm text-slate-400">Manage package details inline without modals.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" wire:click="closeForm" class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900/60 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:border-slate-500 hover:text-white">Back</button>
                </div>
            </div>

            <form wire:submit.prevent="save" class="mt-6 grid gap-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2 flex flex-col gap-1.5">
                        <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Name (EN)</label>
                        <input type="text" wire:model.defer="name_en" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="e.g. Basic" />
                    </div>
                    <div class="md:col-span-2 flex flex-col gap-1.5">
                        <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Description (EN)</label>
                        <textarea wire:model.defer="description_en" rows="3" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="Short description shown on the landing page..."></textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Price</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-xs text-slate-500">$</span>
                            <input type="number" wire:model.defer="price" step="0.01" min="0" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 pl-7 pr-3 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="0.00" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Sessions</label>
                        <input type="number" wire:model.defer="sessions" min="1" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="1" />
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Validity</label>
                        <input type="text" wire:model.defer="validity" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="e.g. Valid for 8 weeks" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Sort Order</label>
                        <input type="number" wire:model.defer="sort_order" min="0" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="0" />
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Status</label>
                        <label class="inline-flex items-center gap-2 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3 text-sm text-slate-300 cursor-pointer">
                            <input type="checkbox" wire:model.defer="active_status" class="rounded" />
                            <span>Active</span>
                        </label>
                    </div>
                </div>

                <div class="flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
                    <input id="package_discount_eligible" type="checkbox" wire:model.defer="discount_eligible" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#0EB3B9] focus:ring-[#0EB3B9]" />
                    <label for="package_discount_eligible" class="text-sm text-slate-300">Active for deposits</label>
                </div>

                <div class="flex flex-wrap gap-3 pt-2">
                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#0E788D]">{{ $isEdit ? 'Update package' : 'Create package' }}</button>
                    <button type="button" wire:click="closeForm" class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900/60 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:border-slate-500 hover:text-white">Discard</button>
                </div>
            </form>
        </div>
    @endif

    @if($showDeleteModal && $packageToDelete)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/80 p-4">
            <div class="w-full max-w-lg overflow-hidden rounded-3xl border border-slate-800/70 bg-slate-900 shadow-2xl">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-white">Confirm Deletion</h2>
                    <p class="mt-2 text-slate-400">Are you sure you want to permanently delete "{{ $packageToDelete->name_en }}"?</p>
                    <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-end">
                        <button type="button" wire:click="$set('showDeleteModal', false)" class="rounded border border-slate-700/80 px-4 py-2 text-sm text-slate-200">Cancel</button>
                        <button type="button" wire:click="deleteConfirmed" class="rounded bg-red-500 px-4 py-2 text-sm font-semibold text-white">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($showTermForm)
        <div class="mt-6 overflow-hidden rounded-2xl border border-slate-800/70 bg-slate-900/20 p-6 sm:p-8 shadow-2xl shadow-black/10">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-white">{{ $termToEdit ? 'Edit term' : 'New term' }}</h3>
                    <p class="text-sm text-slate-400">Manage package terms and policies inline without modals.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" wire:click="closeTermForm" class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900/60 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:border-slate-500 hover:text-white">Back</button>
                </div>
            </div>

            <form wire:submit.prevent="saveTerm" class="mt-6 grid gap-5">
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Content</label>
                    <textarea wire:model.defer="term_content" rows="4" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="Enter term or policy content..."></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Sort Order</label>
                        <input type="number" wire:model.defer="term_sort_order" min="0" class="rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="0" />
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Status</label>
                        <label class="inline-flex items-center gap-2 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3 text-sm text-slate-300 cursor-pointer">
                            <input type="checkbox" wire:model.defer="term_active_status" class="rounded" />
                            <span>Active</span>
                        </label>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3 pt-2">
                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#0E788D]">{{ $termToEdit ? 'Update term' : 'Create term' }}</button>
                    <button type="button" wire:click="closeTermForm" class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900/60 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:border-slate-500 hover:text-white">Discard</button>
                </div>
            </form>
        </div>
    @endif

    @if($showDeleteModal && $termToEdit)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/80 p-4">
            <div class="w-full max-w-lg overflow-hidden rounded-3xl border border-slate-800/70 bg-slate-900 shadow-2xl">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-white">Confirm Deletion</h2>
                    <p class="mt-2 text-slate-400">Are you sure you want to permanently delete this term?</p>
                    <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-end">
                        <button type="button" wire:click="$set('showDeleteModal', false)" class="rounded border border-slate-700/80 px-4 py-2 text-sm text-slate-200">Cancel</button>
                        <button type="button" wire:click="deleteTermConfirmed" class="rounded bg-red-500 px-4 py-2 text-sm font-semibold text-white">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
