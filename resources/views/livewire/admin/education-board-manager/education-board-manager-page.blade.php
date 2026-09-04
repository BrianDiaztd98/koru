<div class="space-y-6">
    @include('livewire.admin.partials.page-header', [
        'eyebrow' => 'Identity & Content',
        'title' => 'CE Courses',
        'description' => 'Manage educational offerings and enrollment activity.',
    ])

    @unless($showForm)
        <div class="admin-card">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <button type="button" wire:click="openCreateForm" class="admin-btn-primary">
                    Add a course
                </button>
            </div>

            @include('livewire.admin.partials.success-alert')

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
            @include('livewire.admin.partials.form-header', ['title' => $isEdit ? 'Edit course' : 'Create course'])

            <form wire:submit="save" class="mt-6 space-y-5">
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

                <div class="flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
                    <input id="course_active_status" type="checkbox" wire:model.defer="active_status" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#02B8BC] focus:ring-[#02B8BC]" />
                    <label for="course_active_status" class="text-sm text-slate-300">Published on landing page</label>
                </div>

                <div class="flex flex-wrap gap-3 pt-2">
                    <button type="submit" class="admin-btn-primary">{{ $isEdit ? 'Save changes' : 'Create course' }}</button>
                    <button type="button" wire:click="closeForm" class="admin-btn-secondary">Discard</button>
                </div>
            </form>
        </div>
    @endif

    @if ($showDeleteModal && $courseToDelete)
        @include('livewire.admin.partials.delete-modal', [
            'title' => 'Delete course',
            'entity' => $courseToDelete->title_en,
            'confirmAction' => 'deleteConfirmed',
            'cancelAction' => '$set(\'showDeleteModal\', false)',
        ])
    @endif

    <div class="admin-card">
        <h3 class="text-lg font-semibold text-white">Enrollments</h3>

        <div class="admin-table-shell">
            <div class="admin-table-head grid-cols-[1.4fr_1.2fr_0.9fr_0.5fr]">
                <span>Student</span>
                <span>Contact</span>
                <span>License</span>
                <span class="text-right">Status</span>
            </div>
            @forelse ($enrollments as $enrollment)
                <div class="admin-table-row grid-cols-[1.4fr_1.2fr_0.9fr_0.5fr]">
                    <div>
                        <p class="font-semibold text-white">{{ $enrollment->full_name }}</p>
                        <p class="mt-1 text-xs text-slate-500">{{ $enrollment->course?->title_en ?? 'Course deleted' }}</p>
                        @if ($enrollment->message)
                            <p class="mt-1 text-xs text-slate-500 line-clamp-2">{{ $enrollment->message }}</p>
                        @endif
                    </div>
                    <div>
                        <p class="text-slate-300">{{ $enrollment->email }}</p>
                        <p class="mt-1 text-xs text-slate-500">{{ $enrollment->phone ?? '—' }}</p>
                    </div>
                    <div>
                        <p class="text-slate-300">{{ $enrollment->license_number ?? '—' }}</p>
                        <p class="mt-1 text-xs text-slate-500">{{ $enrollment->source }}</p>
                    </div>
                    <div class="flex justify-end">
                        <span class="inline-flex rounded-full bg-[#02B8BC]/10 px-2 py-1 text-[10px] font-bold uppercase tracking-wider text-[#02B8BC]">{{ $enrollment->status }}</span>
                    </div>
                </div>
            @empty
                <div class="admin-table-empty">No enrollment records yet.</div>
            @endforelse
        </div>
    </div>
</div>
