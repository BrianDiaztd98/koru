<div class="lg:col-span-3 space-y-6">
    <div class="mb-6">
        <p class="font-mono text-xs font-bold uppercase tracking-[0.24em] text-[#02B8BC]">Hero Core Manager</p>
        <h1 class="mt-2 text-3xl font-extrabold text-white tracking-tight">Hero Carousel Manager</h1>
        <p class="mt-2.5 max-w-2xl text-sm leading-relaxed text-slate-400">Matrix configuration for landing page rotators.</p>
    </div>

    @unless ($showForm)
        <div class="admin-card">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <button type="button" wire:click="openCreateForm"
                    class="admin-btn-primary font-mono text-xs tracking-wider uppercase cursor-pointer">
                    + Add New Slide
                </button>
            </div>

            @if (session()->has('success'))
                <div class="mt-4 rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300 font-mono">
                    [success] {{ session('success') }}
                </div>
            @endif

            <div class="mt-6 overflow-hidden rounded-xl border border-slate-900 bg-slate-950/20 backdrop-blur-md">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-800/60 bg-slate-950/50 font-mono text-[11px] font-bold uppercase tracking-wider text-slate-500">
                            <th class="px-4 py-3.5 w-10 text-center">Order</th>
                            <th class="px-4 py-3.5 w-[45%]">Slide Details</th>
                            <th class="px-4 py-3.5 w-[20%]">Status</th>
                            <th class="px-4 py-3.5 w-[25%] text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-900/60">
                        @forelse($slides as $index => $slide)
                            <tr class="group transition-all duration-200 hover:bg-slate-900/30">
                                <td class="px-4 py-4 align-middle text-center">
                                    <div class="flex items-center justify-center gap-1.5">
                                        @if ($slide->is_featured)
                                            <span class="inline-flex items-center gap-1 rounded-full bg-amber-500/10 border border-amber-500/20 px-2 py-0.5">
                                                <svg class="w-3 h-3 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                                <span class="font-mono text-[10px] font-bold text-amber-400">Featured</span>
                                            </span>
                                        @endif
                                        <span class="font-mono text-xs text-slate-500 w-6 text-right">{{ $index + 1 }}</span>
                                    </div>
                                </td>

                                <td class="px-4 py-4 align-middle">
                                    <div class="flex items-center gap-4">
                                        @if ($slide->image_url)
                                            <div class="h-14 w-14 shrink-0 overflow-hidden rounded-xl border border-slate-800/80 bg-slate-950 shadow-inner">
                                                <img src="{{ $slide->image_url }}" alt="{{ $slide->title_line_1 }}"
                                                    class="h-full w-full object-cover" loading="lazy" />
                                            </div>
                                        @else
                                            <div class="h-14 w-14 shrink-0 rounded-xl border border-dashed border-slate-800 bg-slate-950/50 flex items-center justify-center p-1 text-center">
                                                <span class="font-mono text-[8px] text-slate-600 uppercase tracking-tighter">No Media Asset</span>
                                            </div>
                                        @endif
                                        <div class="space-y-0.5">
                                            <p class="font-semibold text-sm text-white tracking-tight group-hover:text-[#02B8BC] transition-colors">
                                                {{ $slide->title_line_1 }} <span class="text-[#02B8BC]/60 font-normal">/</span> {{ $slide->title_line_2 }}
                                            </p>
                                            <p class="text-xs text-slate-400 line-clamp-1 font-sans leading-relaxed">
                                                {{ $slide->description }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-4 align-middle">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span class="inline-flex items-center gap-1.5 rounded-lg px-2.5 py-1 font-mono text-[10px] font-bold tracking-wide border {{ $slide->is_active ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : 'bg-slate-800/40 text-slate-500 border-slate-800/80' }}">
                                            <span class="w-1.5 h-1.5 rounded-full {{ $slide->is_active ? 'bg-emerald-400 animate-pulse' : 'bg-slate-600' }}"></span>
                                            {{ $slide->is_active ? 'Active' : 'Inactive' }}
                                        </span>

                                        @if ($slide->badge)
                                            <span class="rounded-md border border-slate-800 bg-slate-900 px-2 py-0.5 font-mono text-[10px] font-semibold text-[#02B8BC] tracking-tight">
                                                {{ $slide->badge }}
                                            </span>
                                        @endif
                                    </div>
                                </td>

                                <td class="px-4 py-4 align-middle text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-1.5">
                                        {{-- Move Up --}}
                                        @if ($index > 0)
                                            <button type="button" wire:click="moveUp({{ $slide->id }})"
                                                class="admin-btn-ghost p-2 hover:text-[#02B8BC] cursor-pointer" title="Move up">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                                            </button>
                                        @else
                                            <span class="w-8 h-8 inline-flex items-center justify-center text-slate-700 cursor-not-allowed">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                                            </span>
                                        @endif

                                        {{-- Move Down --}}
                                        @if ($index < $slides->count() - 1)
                                            <button type="button" wire:click="moveDown({{ $slide->id }})"
                                                class="admin-btn-ghost p-2 hover:text-[#02B8BC] cursor-pointer" title="Move down">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V5"></path></svg>
                                            </button>
                                        @else
                                            <span class="w-8 h-8 inline-flex items-center justify-center text-slate-700 cursor-not-allowed">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V5"></path></svg>
                                            </span>
                                        @endif

                                        {{-- Toggle Featured --}}
                                        <button type="button" wire:click="toggleFeatured({{ $slide->id }})"
                                            class="admin-btn-ghost p-2 {{ $slide->is_featured ? 'text-amber-400' : 'hover:text-amber-400' }} cursor-pointer" title="{{ $slide->is_featured ? 'Remove featured' : 'Set as featured' }}">
                                            <svg class="w-4 h-4" fill="{{ $slide->is_featured ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        </button>

                                        {{-- Toggle Active --}}
                                        <button type="button" wire:click="toggleActive({{ $slide->id }})"
                                            class="admin-btn-ghost font-mono text-[11px] hover:text-[#02B8BC] cursor-pointer">
                                            {{ $slide->is_active ? 'Deactivate' : 'Activate' }}
                                        </button>

                                        {{-- Edit --}}
                                        <button type="button" wire:click="openEditForm({{ $slide->id }})"
                                            class="admin-btn-ghost font-mono text-[11px] hover:text-white cursor-pointer">
                                            Edit
                                        </button>

                                        {{-- Delete --}}
                                        <button type="button" wire:click.prevent="confirmDelete({{ $slide->id }})"
                                            class="admin-btn-danger font-mono text-[11px] px-2.5 py-1 rounded-lg border border-rose-950/40 bg-rose-950/10 text-rose-400 transition-colors hover:bg-rose-600 hover:text-white cursor-pointer">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-12 text-center border border-dashed border-slate-900 rounded-b-xl bg-slate-950/10">
                                    <p class="font-mono text-xs uppercase tracking-widest text-slate-600">emptyDataset // noHeroSlidesFound</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(method_exists($slides, 'hasPages') && $slides->hasPages())
                <div class="mt-4 pt-4 border-t border-slate-900/40">
                    {{ $slides->links() }}
                </div>
            @endif
        </div>
    @endunless

    @if ($showForm)
        @if ($isEdit)
            @include('livewire.admin.hero-carousel-manager.edit.hero-slide-edit-form')
        @else
            @include('livewire.admin.hero-carousel-manager.create.hero-slide-create-form')
        @endif
    @endif

    @if ($showDeleteModal && $slideToDelete)
        @include('livewire.admin.hero-carousel-manager.delete.hero-slide-delete-modal')
    @endif
</div>



