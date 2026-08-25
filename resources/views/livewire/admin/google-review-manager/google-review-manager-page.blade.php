<div class="lg:col-span-3 space-y-6">
    <div class="mb-6">
        <p class="font-mono text-xs font-bold uppercase tracking-[0.24em] text-[#0EB3B9]">Google Reviews</p>
        <h1 class="mt-2 text-3xl font-extrabold text-white tracking-tight">Google Reviews</h1>
        <p class="mt-2.5 max-w-2xl text-sm leading-relaxed text-slate-400">Manage the testimonials shown on the public landing page.</p>
    </div>

    @unless($showForm)
        <div class="admin-card">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <button type="button" wire:click="openCreateForm" class="admin-btn-primary">
                    Add a review
                </button>
            </div>

            @if (session()->has('success'))
                <div class="mt-4 rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                    {{ session('success') }}
                </div>
            @endif

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
            <div class="mb-6 flex items-center justify-between">
                <h2 class="text-xl font-bold text-white">{{ $isEdit ? 'Edit review' : 'Create review' }}</h2>
                <button type="button" wire:click="closeForm" class="admin-btn-ghost">Cancel</button>
            </div>

            <form wire:submit="save" class="space-y-5">
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

                <div class="flex items-center justify-between rounded-xl border border-slate-800 bg-slate-950/40 px-4 py-3">
                    <span class="text-sm text-slate-300">Visible on landing page</span>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" wire:model.defer="is_active" class="sr-only peer">
                        <span class="relative h-6 w-11 rounded-full bg-slate-700 transition peer-checked:bg-[#0EB3B9]">
                            <span class="absolute left-1 top-1 h-4 w-4 rounded-full bg-white transition peer-checked:translate-x-5"></span>
                        </span>
                    </label>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" wire:click="closeForm" class="admin-btn-ghost">Cancel</button>
                    <button type="submit" class="admin-btn-primary">{{ $isEdit ? 'Save changes' : 'Create review' }}</button>
                </div>
            </form>
        </div>
    @endif

    @if ($showDeleteModal && $reviewToDelete)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/80 p-4">
            <div class="w-full max-w-md rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-2xl">
                <h3 class="text-xl font-bold text-white">Delete review</h3>
                <p class="mt-3 text-sm text-slate-400">Are you sure you want to delete <span class="font-semibold text-white">{{ $reviewToDelete->author_name }}</span>?</p>
                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" wire:click="$set('showDeleteModal', false)" class="admin-btn-ghost">Cancel</button>
                    <button type="button" wire:click="deleteConfirmed" class="admin-btn-danger">Delete</button>
                </div>
            </div>
        </div>
    @endif
</div>