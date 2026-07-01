<?php use Illuminate\Support\Str; ?>

<div class="lg:col-span-3 space-y-6">
    <!-- Título de ubicación actual -->
    <div class="mb-6">
        <p class="font-mono text-xs font-bold uppercase tracking-[0.24em] text-[#0EB3B9]">Team</p>
        <h1 class="mt-2 text-3xl font-extrabold text-white tracking-tight">Team Management</h1>
        <p class="mt-2.5 max-w-2xl text-sm leading-relaxed text-slate-400">Manage the specialists shown in the Team section.</p>
    </div>

    <div class="rounded-2xl border border-slate-800/80 bg-slate-900/20 backdrop-blur-xl p-6 sm:p-8 shadow-2xl shadow-black/40">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            @unless($showForm)
                <button type="button" wire:click="openCreateForm" class="inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-[#0EB3B9]/10 transition hover:bg-[#0E788D]">
                    Add team member
                </button>
            @endunless
        </div>

        @if (session()->has('success'))
            <div class="mt-4 rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                {{ session('success') }}
            </div>
        @endif

        @unless($showForm)
            <div class="mt-6 overflow-hidden rounded-2xl border border-slate-800/70">
                <div class="grid grid-cols-[1.3fr_1fr_0.5fr] gap-4 border-b border-slate-800/70 bg-slate-950/60 px-4 py-3 text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">
                    <span>Member</span>
                    <span>Specialty</span>
                    <span class="text-right">Actions</span>
                </div>
                @forelse ($teamMembers as $member)
                    <div class="grid grid-cols-[1.3fr_1fr_0.5fr] items-center gap-4 border-b border-slate-800/50 bg-slate-900/40 px-4 py-4 text-sm text-slate-300 last:border-b-0">
                        <div>
                            <p class="font-semibold text-white">{{ $member->name }}</p>
                            <p class="mt-1 text-xs text-slate-500">{{ Str::limit($member->bio_en ?: $member->bio_es ?: '', 80) }}</p>
                        </div>
                        <div class="text-slate-400">{{ $member->specialty_en ?: $member->specialty_es ?: '—' }}</div>
                        <div class="flex justify-end gap-2">
                            <button type="button" wire:click="openEditForm({{ $member->id }})" class="rounded-lg border border-slate-700 bg-slate-950/70 px-3 py-2 text-xs font-semibold text-slate-300 hover:border-[#0EB3B9] hover:text-white">Edit</button>
                            <button type="button" wire:click="confirmDelete({{ $member->id }})" class="rounded-lg border border-rose-500/30 bg-rose-500/10 px-3 py-2 text-xs font-semibold text-rose-300 hover:bg-rose-500/20">Delete</button>
                        </div>
                    </div>
                @empty
                    <div class="px-4 py-8 text-center text-sm text-slate-400">No team members yet.</div>
                @endforelse
            </div>
        @endunless
    </div>

    @if ($showForm)
        <div class="mt-6 overflow-hidden rounded-2xl border border-slate-800/70 bg-slate-900/20 p-6 sm:p-8 shadow-2xl shadow-black/10">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-white">{{ $teamMember ? 'Edit member' : 'New member' }}</h3>
                    <p class="text-sm text-slate-400">Manage team profiles inline without modals.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.team.index') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900/60 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:border-slate-500 hover:text-white">
                        Volver
                    </a>
                </div>
            </div>

            <form wire:submit.prevent="save" class="grid gap-5 md:grid-cols-2 mt-6">
                <div>
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Name</label>
                    <input type="text" wire:model.defer="name" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" />
                </div>
                <div>
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Instagram</label>
                    <input type="text" wire:model.defer="instagram_handle" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" />
                </div>
                <div>
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Specialty (EN)</label>
                    <input type="text" wire:model.defer="specialty_en" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" />
                </div>
                <div>
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Specialty (ES)</label>
                    <input type="text" wire:model.defer="specialty_es" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" />
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Bio (EN)</label>
                    <textarea wire:model.defer="bio_en" rows="3" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]"></textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Bio (ES)</label>
                    <textarea wire:model.defer="bio_es" rows="3" class="w-full rounded-xl border border-slate-800 bg-slate-900/70 px-4 py-3 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]"></textarea>
                </div>
                <div>
                    <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400">Profile image</label>
                    <input type="file" wire:model="image_file" accept="image/*" class="w-full text-sm text-slate-400 file:mr-3 file:rounded-md file:border-0 file:bg-[#0EB3B9]/10 file:px-3 file:py-2 file:text-sm file:font-semibold file:text-[#0EB3B9]" />

                    @if ($this->currentImageUrl)
                        <div class="mt-4 rounded-2xl border border-slate-800/70 bg-slate-950/80 p-3">
                            <p class="mb-2 text-xs uppercase tracking-[0.24em] text-slate-400">Current photo</p>
                            <img src="{{ $this->currentImageUrl }}" alt="Current team photo" class="h-32 w-full rounded-2xl object-cover" />
                        </div>
                    @endif
                </div>
                <div class="flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
                    <input id="active_status" type="checkbox" wire:model.defer="active_status" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#0EB3B9] focus:ring-[#0EB3B9]" />
                    <label for="active_status" class="text-sm text-slate-300">Publish on the landing page</label>
                </div>

                <div class="md:col-span-2 flex flex-wrap gap-3 pt-2">
                    <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#0E788D]">
                        Save member
                    </button>
                    <button type="button" wire:click="closeForm" class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900/60 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:border-slate-500 hover:text-white">
                        Discard
                    </button>
                </div>
            </form>
        </div>
    @endif

    @if ($showDeleteModal)
        <div class="fixed inset-0 z-[9999] flex items-center justify-center bg-slate-950/80 p-4">
            <div class="w-full max-w-xl overflow-hidden rounded-3xl border border-slate-800/70 bg-slate-900 shadow-2xl">
                <div class="border-b border-slate-800/70 px-6 py-5">
                    <h3 class="text-lg font-semibold text-white">Confirm deletion</h3>
                    <p class="mt-1 text-sm text-slate-400">This action cannot be undone. The team member will be permanently removed.</p>
                </div>

                <div class="p-6">
                    <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                        <button type="button" wire:click="deleteConfirmed" class="inline-flex items-center justify-center rounded-xl bg-rose-500 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-rose-600">
                            Delete member
                        </button>
                        <button type="button" wire:click="$set('showDeleteModal', false)" class="inline-flex items-center justify-center rounded-xl border border-slate-700 bg-slate-900/70 px-4 py-2.5 text-sm font-semibold text-slate-200 transition hover:border-slate-500 hover:text-white">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
