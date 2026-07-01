<?php

namespace App\Livewire\Admin;

use App\Models\TeamMember;
use App\Services\AdminMediaService;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class TeamMembersPage extends Component
{
    use WithFileUploads;

    public ?TeamMember $teamMember = null;

    public string $name = '';

    public string $instagram_handle = '';

    public string $bio_en = '';

    public string $bio_es = '';

    public string $specialty_en = '';

    public string $specialty_es = '';

    public ?TemporaryUploadedFile $image_file = null;

    public bool $active_status = true;

    public bool $showForm = false;

    public bool $showDeleteModal = false;

    public ?TeamMember $teamMemberToDelete = null;

    public bool $isEdit = false;

    public function mount(?TeamMember $teamMember = null): void
    {
        $this->teamMember = $teamMember;
        $this->isEdit = $teamMember !== null;
        $this->showForm = request()->routeIs('admin.team.create') || request()->routeIs('admin.team.edit');

        if ($this->teamMember) {
            $this->fill([
                'name' => $this->teamMember->name ?? '',
                'instagram_handle' => $this->teamMember->instagram_handle ?? '',
                'bio_en' => $this->teamMember->bio_en ?? '',
                'bio_es' => $this->teamMember->bio_es ?? '',
                'specialty_en' => $this->teamMember->specialty_en ?? '',
                'specialty_es' => $this->teamMember->specialty_es ?? '',
                'active_status' => (bool) $this->teamMember->active_status,
            ]);
        }
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'instagram_handle' => ['nullable', 'string', 'max:255'],
            'bio_en' => ['nullable', 'string'],
            'bio_es' => ['nullable', 'string'],
            'specialty_en' => ['nullable', 'string', 'max:255'],
            'specialty_es' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'max:2048', 'mimes:jpg,jpeg,png,webp'],
            'active_status' => ['boolean'],
        ];
    }

    public function openCreateForm(): void
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function openEditForm(int $teamMemberId): void
    {
        $teamMember = TeamMember::findOrFail($teamMemberId);
        $this->teamMember = $teamMember;
        $this->isEdit = true;
        $this->fill([
            'name' => $teamMember->name ?? '',
            'instagram_handle' => $teamMember->instagram_handle ?? '',
            'bio_en' => $teamMember->bio_en ?? '',
            'bio_es' => $teamMember->bio_es ?? '',
            'specialty_en' => $teamMember->specialty_en ?? '',
            'specialty_es' => $teamMember->specialty_es ?? '',
            'active_status' => (bool) $teamMember->active_status,
        ]);
        $this->showForm = true;
    }

    public function closeForm(): void
    {
        $this->resetForm();

        if (request()->routeIs('admin.team.create') || request()->routeIs('admin.team.edit')) {
            $this->redirectRoute('admin.team.index');
        }
    }

    public function save(): void
    {
        $validated = $this->validate();

        if ($this->image_file instanceof TemporaryUploadedFile) {
            $validated['image_path'] = AdminMediaService::storeImage($this->image_file, 'team');
        }

        if ($this->teamMember && $this->teamMember->exists) {
            $this->teamMember->update($validated);
            session()->flash('success', 'Team member updated successfully.');
        } else {
            TeamMember::query()->create($validated);
            session()->flash('success', 'Team member created successfully.');
        }

        $this->closeForm();
    }

    public function confirmDelete(int $teamMemberId): void
    {
        $this->teamMemberToDelete = TeamMember::findOrFail($teamMemberId);
        $this->showDeleteModal = true;
    }

    public function deleteConfirmed(): void
    {
        if (! $this->teamMemberToDelete) {
            return;
        }

        if ($this->teamMemberToDelete->image_path) {
            AdminMediaService::deleteImage($this->teamMemberToDelete->image_path);
        }

        $this->teamMemberToDelete->delete();
        $this->teamMemberToDelete = null;
        $this->showDeleteModal = false;

        session()->flash('success', 'Team member removed.');
    }

    public function getCurrentImageUrlProperty(): ?string
    {
        if ($this->image_file instanceof TemporaryUploadedFile) {
            return $this->image_file->temporaryUrl();
        }

        return AdminMediaService::resolveImageUrl($this->teamMember?->image_path ?? null);
    }

    public function resetForm(): void
    {
        $this->teamMember = null;
        $this->isEdit = false;
        $this->name = '';
        $this->instagram_handle = '';
        $this->bio_en = '';
        $this->bio_es = '';
        $this->specialty_en = '';
        $this->specialty_es = '';
        $this->image_file = null;
        $this->active_status = true;
        $this->showForm = false;
    }

    public function render(): View
    {
        return view('livewire.admin.team-members-page', [
            'teamMembers' => TeamMember::query()->orderByDesc('id')->get(),
        ])
            ->layout('components.layouts.admin', [
                'title' => 'Team Management',
                'activeTarget' => 'team',
            ]);
    }
}
