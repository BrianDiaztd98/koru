<?php ?>

<div class="lg:col-span-3 space-y-6">
    <!-- Título de ubicación actual -->
    <div class="mb-6">
        <p class="font-mono text-xs font-bold uppercase tracking-[0.24em] text-[#0EB3B9]">Users</p>
        <h1 class="mt-2 text-3xl font-extrabold text-white tracking-tight">User Management</h1>
        <p class="mt-2.5 max-w-2xl text-sm leading-relaxed text-slate-400">Manage administrative users. Create, edit, and activate/deactivate accounts.</p>
    </div>

    <div class="admin-card">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            @unless($showForm)
                <button type="button" wire:click="openCreateForm" class="admin-btn-primary">
                    Add User
                </button>
            @endunless
        </div>

        @if (session()->has('success'))
            <div class="mt-4 rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mt-4 rounded-xl border border-rose-500/20 bg-rose-500/10 px-4 py-3 text-sm text-rose-300">
                {{ session('error') }}
            </div>
        @endif

        @unless($showForm)
            <div class="admin-table-shell">
                <div class="admin-table-head grid-cols-[1.5fr_1fr_1fr_0.8fr_0.7fr]">
                    <span>User</span>
                    <span>Email</span>
                    <span>Role</span>
                    <span>Status</span>
                    <span class="text-right">Actions</span>
                </div>
                @forelse ($users as $user)
                    <div class="admin-table-row grid-cols-[1.5fr_1fr_1fr_0.8fr_0.7fr]">
                        <div>
                            <p class="font-semibold text-white">{{ $user->name }}</p>
                            <p class="mt-1 text-xs text-slate-500">
                                @if($user->creator)
                                    Created by {{ $user->creator->name }} • {{ $user->created_at->format('M d, Y') }}
                                @else
                                    {{ $user->created_at->format('M d, Y') }}
                                @endif
                            </p>
                        </div>
                        <div class="text-slate-300">{{ $user->email }}</div>
                        <div>
                            <span class="inline-flex items-center rounded-full bg-[#0EB3B9]/10 px-2.5 py-0.5 text-xs font-semibold text-[#0EB3B9] border border-[#0EB3B9]/20">
                                {{ ucfirst($user->role) }}
                            </span>
                        </div>
                        <div>
                            <button type="button"
                                    wire:click="toggleStatus({{ $user->id }})"
                                    class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-xs font-semibold transition-all
                                        {{ $user->status === 'activo'
                                            ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 hover:bg-emerald-500/20'
                                            : 'bg-rose-500/10 text-rose-400 border border-rose-500/20 hover:bg-rose-500/20' }}"
                                    wire:loading.attr="disabled">
                                <span class="h-1.5 w-1.5 rounded-full
                                    {{ $user->status === 'activo' ? 'bg-emerald-400' : 'bg-rose-400' }}"></span>
                                {{ ucfirst($user->status) }}
                            </button>
                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="button" wire:click="openEditForm({{ $user->id }})" class="admin-btn-ghost">Edit</button>
                        </div>
                    </div>
                @empty
                    <div class="admin-table-empty">No users found.</div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-4 flex items-center justify-center">
                {{ $users->links() }}
            </div>
        @endunless
    </div>

    @if ($showForm)
        @if ($isEdit)
            @include('livewire.admin.user-manager.edit.user-edit-form')
        @else
            @include('livewire.admin.user-manager.create.user-create-form')
        @endif
    @endif
</div>

