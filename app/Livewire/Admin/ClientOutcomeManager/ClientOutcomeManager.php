<?php

namespace App\Livewire\Admin\ClientOutcomeManager;

use App\Models\Testimonial;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class ClientOutcomeManager extends Component
{
    use WithFileUploads;

    public ?Testimonial $testimonial = null;

    public ?Testimonial $testimonialToDelete = null;

    public string $title = '';

    public string $description = '';

    public string $category = 'clinical';

    public string $video_path = '';

    public ?TemporaryUploadedFile $video_file = null;

    public bool $active_status = true;

    public bool $showForm = false;

    public bool $showDeleteModal = false;

    public bool $isEdit = false;

    public function mount(?Testimonial $testimonial = null): void
    {
        $this->testimonial = $testimonial;
        $this->isEdit = $testimonial !== null;
        $this->showForm = request()->routeIs('admin.client-outcomes.create') || request()->routeIs('admin.client-outcomes.edit');

        if ($this->testimonial) {
            $this->fill([
                'title' => $this->testimonial->title ?? '',
                'description' => $this->testimonial->description ?? '',
                'category' => $this->testimonial->category ?? 'clinical',
                'video_path' => $this->testimonial->video_path ?? $this->testimonial->video_url ?? '',
                'active_status' => (bool) $this->testimonial->active_status,
            ]);
        }
    }

    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:2000'],
            'category' => ['required', 'string', 'in:lounge,athlete,clinical'],
            'video_path' => ['nullable', 'string', 'max:255'],
            'video_file' => ['nullable', 'file', 'mimes:mp4,webm,mov,avi', 'max:51200'],
            'active_status' => ['boolean'],
        ];
    }

    public function openCreateForm(): void
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function openEditForm(int $testimonialId): void
    {
        $testimonial = Testimonial::findOrFail($testimonialId);
        $this->testimonial = $testimonial;
        $this->isEdit = true;
        $this->fill([
            'title' => $testimonial->title ?? '',
            'description' => $testimonial->description ?? '',
            'category' => $testimonial->category ?? 'clinical',
            'video_path' => $testimonial->video_path ?? $testimonial->video_url ?? '',
            'active_status' => (bool) $testimonial->active_status,
        ]);
        $this->showForm = true;
    }

    public function closeForm(): void
    {
        $this->resetForm();
        $this->showForm = false;

        if (request()->routeIs('admin.client-outcomes.create') || request()->routeIs('admin.client-outcomes.edit')) {
            $this->redirectRoute('admin.client-outcomes.index');
        }
    }

    public function confirmDelete(int $testimonialId): void
    {
        $this->testimonialToDelete = Testimonial::findOrFail($testimonialId);
        $this->showDeleteModal = true;
    }

    public function deleteConfirmed(): void
    {
        if (! $this->testimonialToDelete) {
            return;
        }

        $this->testimonialToDelete->delete();
        $this->testimonialToDelete = null;
        $this->showDeleteModal = false;

        session()->flash('success', 'Client outcome removed.');
    }

    public function save(): void
    {
        $validated = $this->validate();

        if ($this->video_file instanceof TemporaryUploadedFile) {
            $validated['video_path'] = 'videos/testimonials/'.$this->video_file->getClientOriginalName();
            $this->video_file->storeAs('public/videos/testimonials', $this->video_file->getClientOriginalName());
        }

        $validated['author_name'] = $validated['title'];
        $validated['author_role'] = 'Client Outcome';
        $validated['quote_en'] = $validated['description'];

        if ($this->testimonial && $this->testimonial->exists) {
            $this->testimonial->update($validated);
            session()->flash('success', 'Client outcome updated successfully.');
        } else {
            Testimonial::query()->create($validated);
            session()->flash('success', 'Client outcome created successfully.');
        }

        $this->closeForm();
    }

    public function resetForm(): void
    {
        $this->testimonial = null;
        $this->isEdit = false;
        $this->title = '';
        $this->description = '';
        $this->category = 'clinical';
        $this->video_path = '';
        $this->video_file = null;
        $this->active_status = true;
    }

    public function render(): View
    {
        return view('livewire.admin.client-outcome-manager.client-outcome-manager-page', [
            'testimonials' => Testimonial::query()->orderByDesc('id')->get(),
        ])
            ->layout('components.layouts.admin');
    }
}
