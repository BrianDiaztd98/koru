<div>
    <div class="lg:col-span-3 space-y-6">
        <!-- Título de ubicación actual -->
        <div class="mb-6">
            <p class="font-mono text-xs font-bold uppercase tracking-[0.24em] text-[#0EB3B9]">Packages</p>
            <h1 class="mt-2 text-3xl font-extrabold text-white tracking-tight">Package Manager</h1>
            <p class="mt-2.5 max-w-2xl text-sm leading-relaxed text-slate-400">Manage therapeutic packages and terms for booking on the public portal.</p>
        </div>

        <div class="rounded-2xl border border-slate-800/80 bg-slate-900/40 p-6 shadow-xl">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h3 class="text-lg font-semibold">Active Packages</h3>

                <button type="button" wire:click="openCreateModal" class="inline-flex items-center gap-2 rounded-lg bg-[#0EB3B9] px-3 py-1 text-xs font-semibold text-white">New Package</button>
            </div>

            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-700 text-sm">
                    <thead class="bg-slate-950/80 text-slate-300">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold">Name</th>
                            <th class="px-4 py-3 text-left font-semibold">Sessions</th>
                            <th class="px-4 py-3 text-left font-semibold">Price</th>
                            <th class="px-4 py-3 text-left font-semibold">Validity</th>
                            <th class="px-4 py-3 text-left font-semibold">Status</th>
                            <th class="px-4 py-3 text-right font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800 text-slate-300">
                        @forelse($packages as $package)
                            <tr wire:key="package-{{ $package->id }}" class="bg-slate-950/40">
                                <td class="px-4 py-3">
                                    <div class="font-semibold text-white">{{ $package->name_en }}</div>
                                    <div class="text-xs text-slate-500">{{ $package->name_es }}</div>
                                    <div class="text-xs text-slate-500 mt-1">{{ Str::limit($package->description_en, 90) }}</div>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center rounded-full bg-slate-900/80 px-2 py-1 text-xs text-slate-300">{{ $package->sessions }}</span>
                                </td>
                                <td class="px-4 py-3 font-mono text-white">${{ number_format($package->price, 2) }}</td>
                                <td class="px-4 py-3 text-slate-400">{{ $package->validity ?? '—' }}</td>
                                <td class="px-4 py-3">
                                    @if($package->active_status)
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/20 px-2.5 py-1 text-xs font-semibold text-emerald-400">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-800/60 border border-slate-700/60 px-2.5 py-1 text-xs font-semibold text-slate-400">
                                            <span class="h-1.5 w-1.5 rounded-full bg-slate-500"></span>
                                            Inactive
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <button type="button" wire:click="openEditModal({{ $package->id }})" class="text-xs text-slate-300 bg-slate-900/40 px-3 py-1.5 rounded-lg hover:bg-slate-900 transition-colors">Edit</button>
                                        <button type="button" wire:click.prevent="confirmDelete({{ $package->id }})" class="text-xs text-red-400 hover:text-red-300 transition-colors">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-slate-500">No packages found. Create your first package to get started.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $packages->links() }}
            </div>
        </div>

        <div class="rounded-2xl border border-slate-800/80 bg-slate-900/40 p-6 shadow-xl">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h3 class="text-lg font-semibold">Terms & Policies</h3>
                <button type="button" wire:click="openCreateTermModal" class="inline-flex items-center gap-2 rounded-lg bg-[#0EB3B9] px-3 py-1 text-xs font-semibold text-white">New Term</button>
            </div>

            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-700 text-sm">
                    <thead class="bg-slate-950/80 text-slate-300">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold">Content</th>
                            <th class="px-4 py-3 text-left font-semibold">Sort</th>
                            <th class="px-4 py-3 text-left font-semibold">Status</th>
                            <th class="px-4 py-3 text-right font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800 text-slate-300">
                        @forelse($terms as $term)
                            <tr wire:key="term-{{ $term['id'] }}" class="bg-slate-950/40">
                                <td class="px-4 py-3">
                                    <div class="text-slate-200">{{ Str::limit($term['content'], 120) }}</div>
                                </td>
                                <td class="px-4 py-3">{{ $term['sort_order'] }}</td>
                                <td class="px-4 py-3">
                                    @if($term['active_status'])
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/20 px-2.5 py-1 text-xs font-semibold text-emerald-400">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-800/60 border border-slate-700/60 px-2.5 py-1 text-xs font-semibold text-slate-400">
                                            <span class="h-1.5 w-1.5 rounded-full bg-slate-500"></span>
                                            Inactive
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <button type="button" wire:click="openEditTermModal({{ $term['id'] }})" class="text-xs text-slate-300 bg-slate-900/40 px-3 py-1.5 rounded-lg hover:bg-slate-900 transition-colors">Edit</button>
                                        <button type="button" wire:click.prevent="confirmDeleteTerm({{ $term['id'] }})" class="text-xs text-red-400 hover:text-red-300 transition-colors">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-8 text-center text-slate-500">No terms found. Create your first term to get started.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($showFormModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/80 p-4">
            <div class="w-full max-w-3xl overflow-hidden rounded-3xl border border-slate-800/70 bg-slate-900 shadow-2xl">
                <div class="flex items-center justify-between border-b border-slate-800/70 px-6 py-4">
                    <div>
                        <h2 class="text-xl font-semibold text-white">{{ $isEdit ? 'Edit Package' : 'Create Package' }}</h2>
                        <p class="text-sm text-slate-400">Manage package details, pricing, and availability.</p>
                    </div>
                    <button type="button" wire:click="closeFormModal" class="rounded-full border border-slate-700/80 bg-slate-950/80 px-3 py-2 text-sm text-slate-200 hover:bg-slate-900">Close</button>
                </div>

                <div class="p-6">
                    <form wire:submit.prevent="save" class="grid gap-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex flex-col gap-1.5">
                                <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Name (EN)</label>
                                <input type="text" wire:model.defer="name_en" class="rounded-xl border border-slate-800/70 bg-slate-950/60 px-3 py-2 text-sm text-white placeholder:text-slate-500 focus:border-[#0EB3B9] focus:outline-none" placeholder="e.g. Basic" />
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Name (ES)</label>
                                <input type="text" wire:model.defer="name_es" class="rounded-xl border border-slate-800/70 bg-slate-950/60 px-3 py-2 text-sm text-white placeholder:text-slate-500 focus:border-[#0EB3B9] focus:outline-none" placeholder="e.g. Básico" />
                            </div>
                        </div>

                        <div class="flex flex-col gap-1.5">
                            <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Description (EN)</label>
                            <textarea wire:model.defer="description_en" rows="3" class="rounded-xl border border-slate-800/70 bg-slate-950/60 px-3 py-2 text-sm text-white placeholder:text-slate-500 focus:border-[#0EB3B9] focus:outline-none" placeholder="Short description shown on the landing page..."></textarea>
                        </div>

                        <div class="flex flex-col gap-1.5">
                            <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Description (ES)</label>
                            <textarea wire:model.defer="description_es" rows="3" class="rounded-xl border border-slate-800/70 bg-slate-950/60 px-3 py-2 text-sm text-white placeholder:text-slate-500 focus:border-[#0EB3B9] focus:outline-none" placeholder="Descripción corta mostrada en la página pública..."></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="flex flex-col gap-1.5">
                                <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Price</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-xs text-slate-500">$</span>
                                    <input type="number" wire:model.defer="price" step="0.01" min="0" class="w-full rounded-xl border border-slate-800/70 bg-slate-950/60 pl-7 pr-3 py-2 text-sm text-white placeholder:text-slate-500 focus:border-[#0EB3B9] focus:outline-none" placeholder="0.00" />
                                </div>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Sessions</label>
                                <input type="number" wire:model.defer="sessions" min="1" class="rounded-xl border border-slate-800/70 bg-slate-950/60 px-3 py-2 text-sm text-white placeholder:text-slate-500 focus:border-[#0EB3B9] focus:outline-none" placeholder="1" />
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Validity</label>
                                <input type="text" wire:model.defer="validity" class="rounded-xl border border-slate-800/70 bg-slate-950/60 px-3 py-2 text-sm text-white placeholder:text-slate-500 focus:border-[#0EB3B9] focus:outline-none" placeholder="e.g. Valid for 8 weeks" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex flex-col gap-1.5">
                                <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Sort Order</label>
                                <input type="number" wire:model.defer="sort_order" min="0" class="rounded-xl border border-slate-800/70 bg-slate-950/60 px-3 py-2 text-sm text-white placeholder:text-slate-500 focus:border-[#0EB3B9] focus:outline-none" placeholder="0" />
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Status</label>
                                <label class="inline-flex items-center gap-2 rounded-xl border border-slate-800/70 bg-slate-950/60 px-3 py-2 text-sm text-slate-300 cursor-pointer">
                                    <input type="checkbox" wire:model.defer="active_status" class="rounded" />
                                    <span>Active</span>
                                </label>
                            </div>
                        </div>

                        <div class="mt-2 flex flex-col gap-3 sm:flex-row sm:justify-end">
                            <button type="button" wire:click="closeFormModal" class="rounded-xl border border-slate-700/80 px-4 py-2 text-sm text-slate-200 hover:bg-slate-900">Cancel</button>
                            <button type="submit" class="rounded-xl bg-[#0EB3B9] px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-[#0EB3B9]/10 hover:bg-[#0E788D] hover:shadow-[#0E788D]/20 active:scale-[0.98]">{{ $isEdit ? 'Update Package' : 'Create Package' }}</button>
                        </div>
                    </form>
                </div>
            </div>
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

    @if($showTermModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/80 p-4">
            <div class="w-full max-w-3xl overflow-hidden rounded-3xl border border-slate-800/70 bg-slate-900 shadow-2xl">
                <div class="flex items-center justify-between border-b border-slate-800/70 px-6 py-4">
                    <div>
                        <h2 class="text-xl font-semibold text-white">{{ $termToEdit ? 'Edit Term' : 'Create Term' }}</h2>
                        <p class="text-sm text-slate-400">Manage package terms and policies content.</p>
                    </div>
                    <button type="button" wire:click="closeTermModal" class="rounded-full border border-slate-700/80 bg-slate-950/80 px-3 py-2 text-sm text-slate-200 hover:bg-slate-900">Close</button>
                </div>

                <div class="p-6">
                    <form wire:submit.prevent="saveTerm" class="grid gap-5">
                        <div class="flex flex-col gap-1.5">
                            <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Content</label>
                            <textarea wire:model.defer="term_content" rows="4" class="rounded-xl border border-slate-800/70 bg-slate-950/60 px-3 py-2 text-sm text-white placeholder:text-slate-500 focus:border-[#0EB3B9] focus:outline-none" placeholder="Enter term or policy content..."></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex flex-col gap-1.5">
                                <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Sort Order</label>
                                <input type="number" wire:model.defer="term_sort_order" min="0" class="rounded-xl border border-slate-800/70 bg-slate-950/60 px-3 py-2 text-sm text-white placeholder:text-slate-500 focus:border-[#0EB3B9] focus:outline-none" placeholder="0" />
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label class="text-xs font-semibold uppercase tracking-wider text-slate-400">Status</label>
                                <label class="inline-flex items-center gap-2 rounded-xl border border-slate-800/70 bg-slate-950/60 px-3 py-2 text-sm text-slate-300 cursor-pointer">
                                    <input type="checkbox" wire:model.defer="term_active_status" class="rounded" />
                                    <span>Active</span>
                                </label>
                            </div>
                        </div>

                        <div class="mt-2 flex flex-col gap-3 sm:flex-row sm:justify-end">
                            <button type="button" wire:click="closeTermModal" class="rounded-xl border border-slate-700/80 px-4 py-2 text-sm text-slate-200 hover:bg-slate-900">Cancel</button>
                            <button type="submit" class="rounded-xl bg-[#0EB3B9] px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-[#0EB3B9]/10 hover:bg-[#0E788D] hover:shadow-[#0E788D]/20 active:scale-[0.98]">{{ $termToEdit ? 'Update Term' : 'Create Term' }}</button>
                        </div>
                    </form>
                </div>
            </div>
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
