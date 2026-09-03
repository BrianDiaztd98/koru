<div class="lg:col-span-3 space-y-6">
    <div class="mb-6">
        <p class="font-mono text-xs font-bold uppercase tracking-[0.24em] text-[#02B8BC]">CE Courses</p>
        <h1 class="mt-2 text-3xl font-extrabold text-white tracking-tight">CE Courses</h1>
        <p class="mt-2.5 max-w-2xl text-sm leading-relaxed text-slate-400">Manage educational offerings and enrollment activity.</p>
    </div>

    @unless($showForm)
        <div class="admin-card space-y-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <button type="button" wire:click="openCreateForm" class="admin-btn-primary">
                    Add a course
                </button>
            </div>

            @if (session()->has('success'))
                <div class="rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                    {{ session('success') }}
                </div>
            @endif

            <div class="admin-table-shell">
                <div class="admin-table-head grid-cols-[1.5fr_0.7fr_0.7fr_0.6fr]">
                    <span>Course</span>
                    <span>Date</span>
                    <span>Status</span>
                    <span class="text-right">Actions</span>
                </div>
                @forelse ($courses as $course)
                    <div class="admin-table-row grid-cols-[1.5fr_0.7fr_0.7fr_0.6fr]">
                        <div>
                            <p class="font-semibold text-white">{{ $course->title_en }}</p>
                            <p class="mt-1 text-xs text-slate-500">{{ $course->ce_credits }} CE credits</p>
                        </div>
                        <div class="text-slate-300">{{ $course->date?->format('M j, Y') }}</div>
                        <div>
                            <span class="inline-flex rounded-full px-2 py-1 text-[10px] font-bold uppercase tracking-wider {{ $course->active_status ? 'bg-emerald-500/10 text-emerald-300' : 'bg-slate-700/80 text-slate-300' }}">
                                {{ $course->active_status ? 'Live' : 'Draft' }}
                            </span>
                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="button" wire:click="toggleStatus({{ $course->id }})" class="admin-btn-ghost">{{ $course->active_status ? 'Hide' : 'Show' }}</button>
                            <button type="button" wire:click="openEditForm({{ $course->id }})" class="admin-btn-ghost">Edit</button>
                            <button type="button" wire:click.prevent="confirmDelete({{ $course->id }})" class="admin-btn-danger">Delete</button>
                        </div>
                    </div>
                @empty
                    <div class="admin-table-empty">No courses yet.</div>
                @endforelse
            </div>
        </div>
    @endunless

    @if ($showForm)
        <div class="admin-card">
            <div class="mb-6 flex items-center justify-between">
                <h2 class="text-xl font-bold text-white">{{ $isEdit ? 'Edit course' : 'Create course' }}</h2>
                <button type="button" wire:click="closeForm" class="admin-btn-ghost">Cancel</button>
            </div>

            <form wire:submit="save" class="space-y-5">
                <div class="grid gap-5 md:grid-cols-2">
                    <div class="md:col-span-2">
                        <label class="admin-label">Course title <span class="text-rose-400">(*)</span></label>
                        <input type="text" wire:model.defer="title_en" class="admin-input" placeholder="Advanced Recovery Workshop" />
                        @error('title_en') <span class="admin-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="admin-label">Description <span class="text-rose-400">(*)</span></label>
                        <textarea wire:model.defer="description_en" rows="5" class="admin-input" placeholder="Course summary..."></textarea>
                        @error('description_en') <span class="admin-error">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="admin-label">CE Credits <span class="text-rose-400">(*)</span></label>
                        <input type="number" min="0" wire:model.defer="ce_credits" class="admin-input" />
                        @error('ce_credits') <span class="admin-error">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="admin-label">Date <span class="text-rose-400">(*)</span></label>
                        <input type="date" wire:model.defer="date" class="admin-input" />
                        @error('date') <span class="admin-error">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="admin-label">Price <span class="text-rose-400">(*)</span></label>
                        <input type="number" min="0" step="0.01" wire:model.defer="price" class="admin-input" />
                        @error('price') <span class="admin-error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between rounded-xl border border-slate-800 bg-slate-950/40 px-4 py-3">
                    <span class="text-sm text-slate-300">Published on landing page</span>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" wire:model.defer="active_status" class="sr-only peer">
                        <span class="relative h-6 w-11 rounded-full bg-slate-700 transition peer-checked:bg-[#02B8BC]">
                            <span class="absolute left-1 top-1 h-4 w-4 rounded-full bg-white transition peer-checked:translate-x-5"></span>
                        </span>
                    </label>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" wire:click="closeForm" class="admin-btn-ghost">Cancel</button>
                    <button type="submit" class="admin-btn-primary">{{ $isEdit ? 'Save changes' : 'Create course' }}</button>
                </div>
            </form>
        </div>
    @endif

    @if ($showDeleteModal && $courseToDelete)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/80 p-4">
            <div class="w-full max-w-md rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-2xl">
                <h3 class="text-xl font-bold text-white">Delete course</h3>
                <p class="mt-3 text-sm text-slate-400">Are you sure you want to delete <span class="font-semibold text-white">{{ $courseToDelete->title_en }}</span>?</p>
                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" wire:click="$set('showDeleteModal', false)" class="admin-btn-ghost">Cancel</button>
                    <button type="button" wire:click="deleteConfirmed" class="admin-btn-danger">Delete</button>
                </div>
            </div>
        </div>
    @endif

    <div class="admin-card">
        <div class="mb-4">
            <h2 class="text-xl font-bold text-white">Enrollments</h2>
        </div>
        @if ($enrollments->isEmpty())
            <div class="admin-table-empty">No enrollment records yet.</div>
        @else
            <div class="space-y-3">
                @foreach ($enrollments as $enrollment)
                    <div class="rounded-2xl border border-slate-800 bg-slate-950/40 p-4">
                        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <p class="font-semibold text-white">{{ $enrollment->full_name }}</p>
                                <p class="text-xs text-slate-400">{{ $enrollment->course?->title_en ?? 'Course deleted' }}</p>
                            </div>
                            <span class="inline-flex rounded-full bg-[#02B8BC]/10 px-2 py-1 text-[10px] font-bold uppercase tracking-wider text-[#02B8BC]">{{ $enrollment->status }}</span>
                        </div>
                        <div class="mt-3 grid gap-2 text-sm text-slate-300 md:grid-cols-3">
                            <span>{{ $enrollment->email }}</span>
                            <span>{{ $enrollment->phone ?? '—' }}</span>
                            <span>License: {{ $enrollment->license_number ?? '—' }}</span>
                            <span>{{ $enrollment->source }}</span>
                        </div>
                        @if ($enrollment->message)
                            <p class="mt-3 text-sm text-slate-400">{{ $enrollment->message }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
