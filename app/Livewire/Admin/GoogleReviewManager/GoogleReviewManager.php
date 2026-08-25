<?php

namespace App\Livewire\Admin\GoogleReviewManager;

use App\Models\GoogleReview;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class GoogleReviewManager extends Component
{
    use WithFileUploads;

    public ?GoogleReview $review = null;

    public ?GoogleReview $reviewToDelete = null;

    public string $author_name = '';

    public string $author_role = '';

    public int $rating = 5;

    public string $content = '';

    public int $sort_order = 0;

    public bool $is_active = true;

    public bool $showForm = false;

    public bool $showDeleteModal = false;

    public bool $isEdit = false;

    public ?TemporaryUploadedFile $image_file = null;

    public function mount(?GoogleReview $googleReview = null): void
    {
        $this->review = $googleReview;
        $this->isEdit = $googleReview !== null;
        $this->showForm = request()->routeIs('admin.google-reviews.create') || request()->routeIs('admin.google-reviews.edit');

        if ($this->review) {
            $this->fill([
                'author_name' => $this->review->author_name,
                'author_role' => $this->review->author_role ?? '',
                'rating' => (int) ($this->review->rating ?? 5),
                'content' => $this->review->content ?? '',
                'sort_order' => (int) ($this->review->sort_order ?? 0),
                'is_active' => (bool) $this->review->is_active,
            ]);
        }
    }

    protected function rules(): array
    {
        return [
            'author_name' => ['required', 'string', 'max:100'],
            'author_role' => ['nullable', 'string', 'max:100'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'content' => ['required', 'string', 'max:2000'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['boolean'],
            'image_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }

    public function openCreateForm(): void
    {
        $this->resetForm();
        $this->sort_order = $this->getNextSortOrder();
        $this->showForm = true;
    }

    public function openEditForm(int $reviewId): void
    {
        $review = GoogleReview::findOrFail($reviewId);
        $this->review = $review;
        $this->isEdit = true;
        $this->fill([
            'author_name' => $review->author_name,
            'author_role' => $review->author_role ?? '',
            'rating' => (int) ($review->rating ?? 5),
            'content' => $review->content ?? '',
            'sort_order' => (int) ($review->sort_order ?? 0),
            'is_active' => (bool) $review->is_active,
        ]);
        $this->showForm = true;
    }

    public function closeForm(): void
    {
        $this->resetForm();
        $this->showForm = false;

        if (request()->routeIs('admin.google-reviews.create') || request()->routeIs('admin.google-reviews.edit')) {
            $this->redirectRoute('admin.google-reviews.index');
        }
    }

    public function confirmDelete(int $reviewId): void
    {
        $this->reviewToDelete = GoogleReview::findOrFail($reviewId);
        $this->showDeleteModal = true;
    }

    public function deleteConfirmed(): void
    {
        if (! $this->reviewToDelete) {
            return;
        }

        $this->reviewToDelete->delete();
        $this->reviewToDelete = null;
        $this->showDeleteModal = false;
        session()->flash('success', 'Review removed successfully.');
    }

    public function toggleActive(int $reviewId): void
    {
        $review = GoogleReview::findOrFail($reviewId);
        $review->update(['is_active' => ! $review->is_active]);
    }

    public function save(): void
    {
        $validated = $this->validate();

        if ($this->image_file instanceof TemporaryUploadedFile) {
            $validated['image_path'] = $this->image_file->store('google-reviews', 'public');
        } elseif ($this->isEdit && $this->review) {
            $validated['image_path'] = $this->review->image_path;
        }

        if ($this->review && $this->review->exists) {
            $this->review->update($validated);
            session()->flash('success', 'Review updated successfully.');
        } else {
            GoogleReview::query()->create($validated);
            session()->flash('success', 'Review created successfully.');
        }

        $this->closeForm();
    }

    protected function getNextSortOrder(): int
    {
        return (int) GoogleReview::query()->max('sort_order') + 1;
    }

    public function resetForm(): void
    {
        $this->review = null;
        $this->isEdit = false;
        $this->author_name = '';
        $this->author_role = '';
        $this->rating = 5;
        $this->content = '';
        $this->sort_order = 0;
        $this->is_active = true;
        $this->image_file = null;
        $this->showDeleteModal = false;
    }

    public function render(): View
    {
        return view('livewire.admin.google-review-manager.google-review-manager-page', [
            'reviews' => GoogleReview::query()->orderBy('sort_order')->orderByDesc('id')->get(),
        ])
            ->layout('components.layouts.admin');
    }
}
