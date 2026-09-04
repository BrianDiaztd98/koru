<div class="space-y-6">
    @include('livewire.admin.partials.page-header', [
        'eyebrow' => 'Identity & Content',
        'title' => 'Team Management',
        'description' => 'Manage the specialists shown in the Team section.',
    ])

    <div class="admin-card">
        @unless($showForm)
            <button type="button" wire:click="openCreateForm" class="admin-btn-primary">
                Add team member
            </button>
        @endunless

        @include('livewire.admin.partials.success-alert')

        @unless($showForm)
            <div class="admin-table-shell">
                <div class="admin-table-head grid-cols-[1.3fr_1fr_0.5fr]">
                    <span>Member</span>
                    <span>Specialty</span>
                    <span class="text-right">Actions</span>
                </div>
                @forelse ($teamMembers as $member)
                    <div class="admin-table-row grid-cols-[1.3fr_1fr_0.5fr]">
                        <div>
                            <p class="font-semibold text-white">{{ $member->name }}</p>
                            <p class="mt-1 text-xs text-slate-500">{{ Str::limit($member->bio_en ?: '', 80) }}</p>
                        </div>
                        <div class="text-slate-400">{{ $member->specialty_en ?: '—' }}</div>
                        <div class="flex justify-end gap-2">
                            <button type="button" wire:click="openEditForm({{ $member->id }})" class="admin-btn-ghost">Edit</button>
                            <button type="button" wire:click="confirmDelete({{ $member->id }})" class="admin-btn-danger">Delete</button>
                        </div>
                    </div>
                @empty
                    <div class="admin-table-empty">No team members yet.</div>
                @endforelse
            </div>
        @endunless
    </div>

    @if ($showForm)
        @if ($isEdit)
            @include('livewire.admin.team-members-manager.edit.team-member-edit-form')
        @else
            @include('livewire.admin.team-members-manager.create.team-member-create-form')
        @endif
    @endif

    @if ($showDeleteModal && $teamMemberToDelete)
        @include('livewire.admin.partials.delete-modal', [
            'title' => 'Delete team member',
            'entity' => $teamMemberToDelete->name,
            'confirmAction' => 'deleteConfirmed',
            'cancelAction' => '$set(\'showDeleteModal\', false)',
        ])
    @endif
</div>



