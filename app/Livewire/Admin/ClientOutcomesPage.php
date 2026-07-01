<?php

namespace App\Livewire\Admin;

use App\Models\Testimonial;
use App\Services\AdminMediaService;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class ClientOutcomesPage extends Component
{
    use WithFileUploads;

    public ?Testimonial $testimonial = null;

    public string $title = '';

    public string $description = '';

    public string $category = 'clinical';

    public string $video_path = '';

    public ?TemporaryUploadedFile $video_file = null;

    public bool $active_status = true;

    public bool $showForm = false;

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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['required', 'string', 'in:lounge,athlete,clinical'],
            'video_path' => ['nullable', 'string', 'max:255'],
            'video_file' => ['nullable', 'file', 'mimes:mp4,webm,mov,avi', 'max:10240'],
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
        $validated['quote_es'] = $validated['description'];

        if ($this->testimonial && $this->testimonial->exists) {
            $this->testimonial->update($validated);
            session()->flash('success', 'Client outcome updated successfully.');
        } else {
            Testimonial::query()->create($validated);
            session()->flash('success', 'Client outcome created successfully.');
        }

        $this->closeForm();
    }

    public function delete(int $testimonialId): void
    {
        $testimonial = Testimonial::findOrFail($testimonialId);
        $testimonial->delete();
        session()->flash('success', 'Client outcome removed.');
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
        return view('livewire.admin.client-outcomes-page', [
            'testimonials' => Testimonial::query()->orderByDesc('id')->get(),
        ])
            ->layout('components.layouts.admin', [
                'title' => 'Client Outcomes',
                'activeTarget' => 'client-outcomes',
            ]);
    }
}
