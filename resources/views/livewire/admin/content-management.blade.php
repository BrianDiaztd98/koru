<div class="min-h-screen bg-slate-950 text-slate-100 antialiased selection:bg-[#0EB3B9]/30 selection:text-white relative overflow-x-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(14,179,185,0.06)_0%,_transparent_40%)] pointer-events-none"></div>
    <div class="absolute top-40 -left-20 w-80 h-80 bg-[#0EB3B9]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 min-h-screen flex flex-col">
        @include('admin.partials.topbar', ['title' => 'Content Management'])

        <main class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-10 flex-1">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">
                <aside class="lg:col-span-1 rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-5 shadow-xl shadow-black/20 sticky top-6">
                    <div>
                        <h3 class="text-xs font-bold uppercase tracking-widest text-[#0EB3B9] font-mono pb-2.5 border-b border-slate-800/50">Admin Sections</h3>
                        <nav class="space-y-4 mt-4">
                            <button wire:click.prevent="setTab('about')"
                                class="w-full text-left px-3.5 py-2.5 rounded-xl font-medium text-sm flex items-center justify-between border transition-all duration-200 cursor-pointer {{ $activeTab === 'about' ? 'border-[#0EB3B9]/50 bg-[#0EB3B9]/10 text-[#0EB3B9]' : 'border-transparent text-slate-400 bg-transparent hover:text-slate-200 hover:bg-slate-900/40' }}">
                                <span class="flex items-center gap-2.5">
                                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 3.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                    About Section
                                </span>
                                <span class="w-1.5 h-1.5 rounded-full bg-current {{ $activeTab === 'about' ? '' : 'opacity-0' }}"></span>
                            </button>

                            <button wire:click.prevent="setTab('services')"
                                class="w-full text-left px-3.5 py-2.5 rounded-xl font-medium text-sm flex items-center justify-between border transition-all duration-200 cursor-pointer {{ $activeTab === 'services' ? 'border-[#0EB3B9]/50 bg-[#0EB3B9]/10 text-[#0EB3B9]' : 'border-transparent text-slate-400 bg-transparent hover:text-slate-200 hover:bg-slate-900/40' }}">
                                <span class="flex items-center gap-2.5">
                                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    Services Management
                                </span>
                                <span class="w-1.5 h-1.5 rounded-full bg-current {{ $activeTab === 'services' ? '' : 'opacity-0' }}"></span>
                            </button>
                        </nav>
                    </div>

                    <div class="pt-4 border-t border-slate-800/50 text-[11px] text-slate-400 leading-relaxed">
                        <div class="flex gap-2.5 items-start">
                            <svg class="w-4 h-4 text-[#0EB3B9] shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 111.063.852l-.708 2.836a.75.75 0 001.063.852l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                            Switch between About and Services without leaving the admin page.
                        </div>
                    </div>
                </aside>

                <section class="lg:col-span-3 space-y-6">
                    @if (session('success'))
                        <div class="rounded-2xl border border-emerald-500/30 bg-emerald-500/10 px-5 py-4 text-sm text-emerald-400 shadow-inner">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="rounded-2xl border border-rose-500/30 bg-rose-500/10 px-5 py-4 text-sm text-rose-400 shadow-inner">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($activeTab === 'about')
                        {{-- About section omitted for brevity in this view --}}
                    @endif

                    @if ($activeTab === 'services')
                        <div class="rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 shadow-xl shadow-black/20 space-y-6">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-4 border-b border-slate-800/60">
                                <div class="flex items-center gap-4">
                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#0EB3B9]/10 text-[#0EB3B9] border border-[#0EB3B9]/20 shadow-inner">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="text-xl font-bold text-white tracking-tight">Services Management</h2>
                                        <p class="text-xs text-slate-400 mt-0.5">Manage all service pillars and categories from one SPA index.</p>
                                    </div>
                                </div>
                                <button wire:click.prevent="openServiceForm" class="inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-[#0E788D]/20 focus:outline-none focus:ring-2 focus:ring-[#0EB3B9] focus:ring-offset-2 focus:ring-offset-slate-900">
                                    Add Service
                                </button>
                            </div>

                            @if ($showServiceForm)
                                <form wire:submit.prevent="saveService" class="rounded-2xl border border-slate-800/80 bg-slate-950/20 p-6 shadow-inner space-y-5">
                                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                        <div>
                                            <h3 class="text-lg font-bold text-white">{{ $editingServiceId ? 'Edit Service' : 'Create Service' }}</h3>
                                            <p class="text-xs text-slate-400">Save service details inline.</p>
                                        </div>
                                        <div class="flex gap-2">
                                            <button type="button" wire:click.prevent="cancelServiceForm" class="rounded-xl border border-slate-700 bg-slate-950/70 px-4 py-2 text-xs font-semibold text-slate-300 hover:bg-slate-900">Cancel</button>
                                            <button type="submit" wire:loading.attr="disabled" class="rounded-xl bg-[#0EB3B9] px-4 py-2 text-xs font-semibold text-white hover:bg-[#0E788D]">Save Service</button>
                                        </div>
                                    </div>

                                    <div class="grid gap-6 lg:grid-cols-2">
                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400">English Name</label>
                                            <input wire:model.defer="serviceForm.name_en" type="text" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/50 px-4 py-3 text-sm text-slate-100 focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/20" />
                                            @error('serviceForm.name_en')<p class="mt-2 text-xs text-rose-400">{{ $message }}</p>@enderror
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400">Spanish Name</label>
                                            <input wire:model.defer="serviceForm.name_es" type="text" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/50 px-4 py-3 text-sm text-slate-100 focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/20" />
                                            @error('serviceForm.name_es')<p class="mt-2 text-xs text-rose-400">{{ $message }}</p>@enderror
                                        </div>

                                        <div class="lg:col-span-2">
                                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400">English Description</label>
                                            <textarea wire:model.defer="serviceForm.description_en" rows="4" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/50 px-4 py-3 text-sm text-slate-100 focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/20"></textarea>
                                            @error('serviceForm.description_en')<p class="mt-2 text-xs text-rose-400">{{ $message }}</p>@enderror
                                        </div>

                                        <div class="lg:col-span-2">
                                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400">Spanish Description</label>
                                            <textarea wire:model.defer="serviceForm.description_es" rows="4" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/50 px-4 py-3 text-sm text-slate-100 focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/20"></textarea>
                                            @error('serviceForm.description_es')<p class="mt-2 text-xs text-rose-400">{{ $message }}</p>@enderror
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400">Duration</label>
                                            <input wire:model.defer="serviceForm.duration" type="text" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/50 px-4 py-3 text-sm text-slate-100 focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/20" />
                                            @error('serviceForm.duration')<p class="mt-2 text-xs text-rose-400">{{ $message }}</p>@enderror
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400">Price ($)</label>
                                            <input wire:model.defer="serviceForm.price" type="number" step="0.01" min="0" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/50 px-4 py-3 text-sm text-slate-100 focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/20" />
                                            @error('serviceForm.price')<p class="mt-2 text-xs text-rose-400">{{ $message }}</p>@enderror
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-400">Category</label>
                                            @if(in_array($serviceForm['category'] ?? '', ['booster_shots','iv_therapy']))
                                                <input type="hidden" wire:model.defer="serviceForm.category" />
                                                <div class="mt-2 text-sm text-slate-400">{{ $categories[$serviceForm['category'] ?? ''] ?? ($serviceForm['category'] ?? '') }}</div>
                                            @else
                                                <select wire:model.defer="serviceForm.category" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/50 px-4 py-3 text-sm text-slate-100 focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/20">
                                                    @foreach($categories as $value => $label)
                                                        @if (!in_array($value, ['booster_shots', 'iv_therapy']))
                                                            <option value="{{ $value }}">{{ $label }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('serviceForm.category')<p class="mt-2 text-xs text-rose-400">{{ $message }}</p>@enderror
                                            @endif
                                        </div>

                                        @if(!in_array($serviceForm['category'] ?? '', ['booster_shots','iv_therapy']))
                                            <div>
                                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400">Image</label>
                                                <input wire:model="serviceImage" type="file" accept="image/*" class="mt-2 w-full text-slate-200" />
                                                @error('serviceImage')<p class="mt-2 text-xs text-rose-400">{{ $message }}</p>@enderror
                                            </div>
                                        @endif

                                        <div class="lg:col-span-2">
                                            <label class="inline-flex items-center gap-3 text-xs font-bold uppercase tracking-wider text-slate-400 cursor-pointer">
                                                <input wire:model.defer="serviceForm.active_status" type="checkbox" class="h-4 w-4 rounded border-slate-700 text-[#0EB3B9] bg-slate-950/50 focus:ring-[#0EB3B9]" />
                                                Active Status
                                            </label>
                                            @error('serviceForm.active_status')<p class="mt-2 text-xs text-rose-400">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                </form>
                            @endif

                            <div class="grid gap-4 sm:grid-cols-2">
                                <button wire:click.prevent="setServicePanel('service_pillars')" class="rounded-2xl border px-4 py-3 text-left text-sm font-semibold transition duration-200 {{ $activeServicePanel === 'service_pillars' ? 'border-[#0EB3B9]/50 bg-[#0EB3B9]/10 text-[#0EB3B9]' : 'border-slate-800/70 bg-slate-950/50 text-slate-300 hover:bg-slate-900/50' }}">
                                    Service Pillars
                                </button>
                                <button wire:click.prevent="setServicePanel('other_services')" class="rounded-2xl border px-4 py-3 text-left text-sm font-semibold transition duration-200 {{ $activeServicePanel === 'other_services' ? 'border-[#0EB3B9]/50 bg-[#0EB3B9]/10 text-[#0EB3B9]' : 'border-slate-800/70 bg-slate-950/50 text-slate-300 hover:bg-slate-900/50' }}">
                                    Other Services
                                </button>
                            </div>

                            @if ($activeServicePanel === 'service_pillars')
                                {{-- Pillar table omitted for brevity --}}
                            @endif

                            @if ($activeServicePanel === 'other_services')
                                @foreach ($serviceGroups['Other Services'] as $key)
                                    <div class="rounded-2xl border border-slate-800/80 bg-slate-950/20 p-5">
                                        <div class="flex items-center justify-between gap-4 mb-5">
                                            <div>
                                                <h3 class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-400">{{ $categories[$key] ?? ucfirst(str_replace('_', ' ', $key)) }}</h3>
                                            </div>
                                            <button wire:click.prevent="openServiceForm('{{ $key }}')" class="inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-3 py-2 text-xs font-semibold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-[#0E788D]/20 active:scale-[0.98]">Add {{ $categories[$key] ?? ucfirst(str_replace('_', ' ', $key)) }}</button>
                                        </div>

                                        <div class="overflow-hidden rounded-xl border border-slate-800/60 bg-slate-900/40 shadow-inner">
                                            <div class="overflow-x-auto">
                                                <table class="min-w-full divide-y divide-slate-800/60 text-left text-sm">
                                                    <thead class="bg-slate-950/60 font-mono text-xs uppercase tracking-wider text-slate-400">
                                                        <tr>
                                                            <th class="px-5 py-3.5 font-bold">Service Info</th>
                                                            <th class="px-5 py-3.5 font-bold">Duration</th>
                                                            <th class="px-5 py-3.5 font-bold">Rate</th>
                                                            <th class="px-5 py-3.5 font-bold">Status</th>
                                                            <th class="px-5 py-3.5 font-bold text-right">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="divide-y divide-slate-800/40">
                                                        @forelse($services[$key] ?? [] as $service)
                                                            <tr class="hover:bg-slate-900/30 transition-colors duration-150 group">
                                                                <td class="px-5 py-4">
                                                                    <div class="font-bold text-white group-hover:text-[#0EB3B9] transition-colors duration-150">{{ $service->name_en }}</div>
                                                                    <div class="text-xs text-slate-500 font-mono mt-0.5">{{ $service->slug }}</div>
                                                                </td>
                                                                <td class="px-5 py-4"><span class="inline-flex items-center gap-1.5 font-mono text-xs text-slate-300 bg-slate-900 px-2 py-1 rounded-md border border-slate-800/60">{{ $service->duration ?? '-' }}</span></td>
                                                                <td class="px-5 py-4 font-mono text-white font-medium">${{ number_format($service->price, 2) }}</td>
                                                                <td class="px-5 py-4">
                                                                    @if ($service->active_status)
                                                                        <span class="inline-flex items-center gap-1.5 text-[11px] font-bold uppercase tracking-wide text-emerald-400 bg-emerald-500/5 border border-emerald-500/20 px-2.5 py-0.5 rounded-full">Active</span>
                                                                    @else
                                                                        <span class="inline-flex items-center gap-1.5 text-[11px] font-bold uppercase tracking-wide text-slate-400 bg-slate-800/30 border border-slate-800/60 px-2.5 py-0.5 rounded-full">Inactive</span>
                                                                    @endif
                                                                </td>
                                                                <td class="px-5 py-4 text-right space-x-2">
                                                                    <button wire:click.prevent="openServiceForm({{ $service->id }})" class="inline-flex items-center justify-center rounded-lg border border-slate-800 bg-slate-950/40 px-3 py-1.5 text-xs font-semibold text-slate-300 hover:bg-slate-900 hover:text-white transition-all duration-150">Edit</button>
                                                                    <button type="button" onclick="if (!confirm('Delete this service?')) return; Livewire.emit('deleteService', {{ $service->id }});" class="inline-flex items-center justify-center rounded-lg border border-slate-800 bg-rose-500/10 px-3 py-1.5 text-xs font-semibold text-rose-300 hover:bg-rose-500/20 transition-all duration-150">Delete</button>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="5" class="px-6 py-16 text-center text-slate-500 font-medium">
                                                                    <div class="flex flex-col items-center justify-center gap-2">
                                                                        <svg class="w-8 h-8 text-slate-700" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                                                        </svg>
                                                                        <span>No services exist for this category yet.</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    @endif
                </section>
            </div>
        </main>
    </div>
</div>
