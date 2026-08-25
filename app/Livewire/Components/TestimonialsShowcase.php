<?php

namespace App\Livewire\Components;

use App\Models\GoogleReview;
use App\Services\AdminMediaService;
use Livewire\Component;

class TestimonialsShowcase extends Component
{
    public array $testimonials = [];

    public int $perPage = 3;

    public int $page = 1;

    public function mount(?array $testimonials = null): void
    {
        if ($testimonials) {
            $this->testimonials = $testimonials;

            return;
        }

        $this->testimonials = GoogleReview::query()
            ->active()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(fn (GoogleReview $review) => [
                'id' => $review->id,
                'category' => 'google',
                'title' => $review->author_name,
                'author_role' => $review->author_role,
                'description' => $review->content,
                'rating' => $review->rating,
                'image_path' => AdminMediaService::resolveImageUrl($review->image_path),
            ])
            ->toArray();
    }

    public function getVisibleTestimonialsProperty(): array
    {
        $slice = array_slice($this->testimonials, ($this->page - 1) * $this->perPage, $this->perPage);

        return array_values($slice);
    }

    public function setPage(int $page): void
    {
        $maxPage = max(1, (int) ceil(count($this->testimonials) / $this->perPage));
        $this->page = max(1, min($maxPage, $page));
    }

    public function nextPage(): void
    {
        $maxPage = (int) ceil(count($this->testimonials) / $this->perPage);
        $this->page = min($maxPage, $this->page + 1);
    }

    public function previousPage(): void
    {
        $this->page = max(1, $this->page - 1);
    }

    public function render()
    {
        return view('livewire.components.testimonials-showcase', [
            'visibleTestimonials' => $this->visibleTestimonials,
            'page' => $this->page,
            'totalPages' => max(1, (int) ceil(count($this->testimonials) / $this->perPage)),
        ]);
    }
}
