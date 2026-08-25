<?php

namespace App\Livewire\Admin\EducationBoardManager;

use App\Models\Course;
use App\Models\CourseEnrollment;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class EducationBoardManager extends Component
{
    public ?Course $course = null;

    public ?Course $courseToDelete = null;

    public string $title_en = '';

    public string $description_en = '';

    public int $ce_credits = 0;

    public ?string $date = null;

    public float $price = 0.0;

    public bool $active_status = true;

    public bool $showForm = false;

    public bool $showDeleteModal = false;

    public bool $isEdit = false;

    public function mount(?Course $course = null): void
    {
        $this->course = $course;
        $this->isEdit = $course !== null;
        $this->showForm = request()->routeIs('admin.education.create') || request()->routeIs('admin.education.edit');

        if ($this->course) {
            $this->fill([
                'title_en' => $this->course->title_en,
                'description_en' => $this->course->description_en,
                'ce_credits' => (int) $this->course->ce_credits,
                'date' => $this->course->date?->format('Y-m-d'),
                'price' => (float) ($this->course->price ?? 0),
                'active_status' => (bool) $this->course->active_status,
            ]);
        }
    }

    protected function rules(): array
    {
        return [
            'title_en' => ['required', 'string', 'max:200'],
            'description_en' => ['required', 'string', 'max:2500'],
            'ce_credits' => ['required', 'integer', 'min:0'],
            'date' => ['required', 'date'],
            'price' => ['required', 'numeric', 'min:0'],
            'active_status' => ['boolean'],
        ];
    }

    public function openCreateForm(): void
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function openEditForm(int $courseId): void
    {
        $course = Course::findOrFail($courseId);
        $this->course = $course;
        $this->isEdit = true;
        $this->fill([
            'title_en' => $course->title_en,
            'description_en' => $course->description_en,
            'ce_credits' => (int) $course->ce_credits,
            'date' => $course->date?->format('Y-m-d'),
            'price' => (float) ($course->price ?? 0),
            'active_status' => (bool) $course->active_status,
        ]);
        $this->showForm = true;
    }

    public function closeForm(): void
    {
        $this->resetForm();
        $this->showForm = false;

        if (request()->routeIs('admin.education.create') || request()->routeIs('admin.education.edit')) {
            $this->redirectRoute('admin.education.index');
        }
    }

    public function confirmDelete(int $courseId): void
    {
        $this->courseToDelete = Course::findOrFail($courseId);
        $this->showDeleteModal = true;
    }

    public function deleteConfirmed(): void
    {
        if (! $this->courseToDelete) {
            return;
        }

        $this->courseToDelete->delete();
        $this->courseToDelete = null;
        $this->showDeleteModal = false;
        session()->flash('success', 'Course removed successfully.');
    }

    public function toggleStatus(int $courseId): void
    {
        $course = Course::findOrFail($courseId);
        $course->update(['active_status' => ! $course->active_status]);
    }

    public function save(): void
    {
        $validated = $this->validate();

        if ($this->course && $this->course->exists) {
            $this->course->update($validated);
            session()->flash('success', 'Course updated successfully.');
        } else {
            Course::query()->create($validated);
            session()->flash('success', 'Course created successfully.');
        }

        $this->closeForm();
    }

    public function resetForm(): void
    {
        $this->course = null;
        $this->isEdit = false;
        $this->title_en = '';
        $this->description_en = '';
        $this->ce_credits = 0;
        $this->date = null;
        $this->price = 0.0;
        $this->active_status = true;
        $this->showDeleteModal = false;
    }

    public function render(): View
    {
        return view('livewire.admin.education-board-manager.education-board-manager-page', [
            'courses' => Course::query()->orderByDesc('date')->get(),
            'enrollments' => CourseEnrollment::query()->with('course')->orderByDesc('created_at')->get(),
        ])
            ->layout('components.layouts.admin');
    }
}
