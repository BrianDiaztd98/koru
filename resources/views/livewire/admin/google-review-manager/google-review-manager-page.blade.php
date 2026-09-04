<div class="space-y-6">
    @include('livewire.admin.partials.page-header', [
        'eyebrow' => 'Identity & Content',
        'title' => 'Google Reviews',
        'description' => 'Manage the testimonials shown on the public landing page.',
    ])

    @unless($showForm)
        <div class="admin-card">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <button type="button" wire:click="openCreateForm" class="admin-btn-primary">
                    Add a review
                </button>
            </div>

            @include('livewire.admin.partials.success-alert')

            <div class="admin-table-shell">
                <div class="admin-table-head grid-cols-[1.2fr_1fr_0.7fr_0.6fr]">
                    <span>Reviewer</span>
                    <span>Rating</span>
                    <span>Status</span>
                    <span class="text-right">Actions</span>
                </div>
                @forelse ($reviews as $review)
                    <div class="admin-table-row grid-cols-[1.2fr_1fr_0.7fr_0.6fr]">
                        <div>
                            <p class="font-semibold text-white">{{ $review->author_name }}</p>
                            <p class="mt-1 text-xs text-slate-500">{{ $review->author_role ?: 'Google review' }}</p>
                        </div>
                        <div class="text-slate-300">{{ str_repeat('★', $review->rating) }}</div>
                        <div>
                            <span class="inline-flex rounded-full px-2 py-1 text-[10px] font-bold uppercase tracking-wider {{ $review->is_active ? 'bg-emerald-500/10 text-emerald-300' : 'bg-slate-700/80 text-slate-300' }}">
                                {{ $review->is_active ? 'Active' : 'Hidden' }}
                            </span>
                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="button" wire:click="toggleActive({{ $review->id }})" class="admin-btn-ghost">{{ $review->is_active ? 'Hide' : 'Show' }}</button>
                            <button type="button" wire:click="openEditForm({{ $review->id }})" class="admin-btn-ghost">Edit</button>
                            <button type="button" wire:click.prevent="confirmDelete({{ $review->id }})" class="admin-btn-danger">Delete</button>
                        </div>
                    </div>
                @empty
                    <div class="admin-table-empty">No reviews yet.</div>
                @endforelse
            </div>
        </div>
    @endunless

    @if ($showForm)
        <div class="admin-card">
            @include('livewire.admin.partials.form-header', ['title' => $isEdit ? 'Edit review' : 'Create review'])

            <form wire:submit="save" class="mt-6 space-y-5">
                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <label class="admin-label">Author name</label>
                        <input type="text" wire:model.defer="author_name" class="admin-input" placeholder="Jane Doe" />
                        @error('author_name') <span class="admin-error">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="admin-label">Author role</label>
                        <input type="text" wire:model.defer="author_role" class="admin-input" placeholder="Recovery client" />
                        @error('author_role') <span class="admin-error">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="admin-label">Rating</label>
                        <select wire:model.defer="rating" class="admin-input">
                            @for ($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}">{{ $i }} stars</option>
                            @endfor
                        </select>
                        @error('rating') <span class="admin-error">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="admin-label">Sort order</label>
                        <input type="number" min="0" wire:model.defer="sort_order" class="admin-input" />
                        @error('sort_order') <span class="admin-error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label class="admin-label">Review content</label>
                    <textarea wire:model.defer="content" rows="5" class="admin-input" placeholder="Share the customer experience..."></textarea>
                    @error('content') <span class="admin-error">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-center gap-3 rounded-xl border border-slate-800/70 bg-slate-900/60 px-4 py-3">
                    <input id="review_is_active" type="checkbox" wire:model.defer="is_active" class="h-4 w-4 rounded border-slate-700 bg-slate-900 text-[#02B8BC] focus:ring-[#02B8BC]" />
                    <label for="review_is_active" class="text-sm text-slate-300">Visible on landing page</label>
                </div>

                <div class="flex flex-wrap gap-3 pt-2">
                    <button type="submit" class="admin-btn-primary">{{ $isEdit ? 'Save changes' : 'Create review' }}</button>
                    <button type="button" wire:click="closeForm" class="admin-btn-secondary">Discard</button>
                </div>
            </form>
        </div>
    @endif

    @if ($showDeleteModal && $reviewToDelete)
        @include('livewire.admin.partials.delete-modal', [
            'title' => 'Delete review',
            'entity' => $reviewToDelete->author_name,
            'confirmAction' => 'deleteConfirmed',
            'cancelAction' => '$set(\'showDeleteModal\', false)',
        ])
    @endif
</div>