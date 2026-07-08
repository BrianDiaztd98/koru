<?php ?>

<div class="lg:col-span-3 space-y-6">
    <!-- Título de ubicación actual -->
    <div class="mb-6">
        <p class="font-mono text-xs font-bold uppercase tracking-[0.24em] text-[#0EB3B9]">Client Outcomes</p>
        <h1 class="mt-2 text-3xl font-extrabold text-white tracking-tight">Client Outcomes</h1>
        <p class="mt-2.5 max-w-2xl text-sm leading-relaxed text-slate-400">Manage the stories shown in the landing page section.</p>
    </div>

    @unless($showForm)
        <div class="admin-card">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <button type="button" wire:click="openCreateForm" class="admin-btn-primary">
                    Create a new outcome story
                </button>
            </div>

            @if (session()->has('success'))
                <div class="mt-4 rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                    {{ session('success') }}
                </div>
            @endif

            <div class="admin-table-shell">
                <div class="admin-table-head grid-cols-[1.4fr_1fr_0.5fr]">
                    <span>Story</span>
                    <span>Category</span>
                    <span class="text-right">Actions</span>
                </div>
                @forelse ($testimonials as $testimonial)
                    <div class="admin-table-row grid-cols-[1.4fr_1fr_0.5fr]">
                        <div>
                            <p class="font-semibold text-white">{{ $testimonial->title }}</p>
                            <p class="mt-1 text-xs text-slate-500">{{ Str::limit($testimonial->description, 90) }}</p>
                        </div>
                        <div class="capitalize text-slate-400">{{ $testimonial->category }}</div>
                        <div class="flex justify-end gap-2">
                            <button type="button" wire:click="openEditForm({{ $testimonial->id }})" class="admin-btn-ghost">Edit</button>
                            <button type="button" wire:click="delete({{ $testimonial->id }})" class="admin-btn-danger">Delete</button>
                        </div>
                    </div>
                @empty
                    <div class="admin-table-empty">No client outcomes yet.</div>
                @endforelse
            </div>
        </div>
    @endunless

    @if ($showForm)
        <div class="admin-form-panel">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-white">{{ $testimonial ? 'Edit story' : 'New story' }}</h3>
                    <p class="text-sm text-slate-400">Manage client stories inline without modals.</p>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" wire:click="closeForm" class="admin-btn-secondary">
                        Volver
                    </button>
                </div>
            </div>

            <form wire:submit.prevent="save" class="grid gap-5 md:grid-cols-2 mt-6">
                    <div>
                        <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Title</label>
                        <input type="text" wire:model.defer="title" class="admin-input" />
                    </div>
                    <div>
                        <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Category</label>
                        <select wire:model.defer="category" class="admin-select">
                            <option value="lounge">Lounge</option>
                            <option value="athlete">Athlete</option>
                            <option value="clinical">Clinical</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Description</label>
                        <textarea wire:model.defer="description" rows="4" class="admin-input"></textarea>
                    </div>
                    <div>
                        <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Video path</label>
                        <input type="text" wire:model.defer="video_path" placeholder="videos/testimonials/1.mp4" class="admin-input" />
                    </div>
                    <div>
                        <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Upload video</label>
                        <input type="file" wire:model="video_file" accept="video/*" class="w-full text-sm text-slate-400 file:mr-3 file:rounded-md file:border-0 file:bg-[#0EB3B9]/10 file:px-3 file:py-2 file:text-sm file:font-semibold file:text-[#0EB3B9]" />
                    </div>
                    <div class="md:col-span-2 flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
                        <input id="active_status" type="checkbox" wire:model.defer="active_status" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#0EB3B9] focus:ring-[#0EB3B9]" />
                        <label for="active_status" class="text-sm text-slate-300">Publish on the landing page</label>
                    </div>

                    <div class="md:col-span-2 flex flex-wrap gap-3 pt-2">
                        <button type="submit" class="admin-btn-primary">
                            Save story
                        </button>
                        <button type="button" wire:click="closeForm" class="admin-btn-secondary">
                            Discard
                        </button>
                    </div>
                </form>
            </div>
    @endif
</div>
