<?php

namespace App\Livewire\Admin\HeroCarouselManager;

use App\Models\HeroSlide;
use App\Models\Service;
use App\Services\AdminMediaService;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class HeroCarouselManager extends Component
{
    use WithFileUploads;

    public ?HeroSlide $slide = null;

    public ?HeroSlide $slideToDelete = null;

    public string $badge = '';

    public string $title_line_1 = '';

    public string $title_line_2 = '';

    public string $description = '';

    public string $btn_primary_text = '';

    public string $btn_primary_url = '';

    public ?string $btn_secondary_text = '';

    public ?string $btn_secondary_url = '';

    public ?TemporaryUploadedFile $image_path = null;

    public ?int $service_id = null;

    public int $sort_order = 0;

    public bool $is_active = true;

    public bool $is_featured = false;

    public bool $showForm = false;

    public bool $showDeleteModal = false;

    public bool $isEdit = false;

    public array $services = [];

    public function mount(): void
    {
        $this->services = Service::query()
            ->where('active_status', true)
            ->orderBy('name_en')
            ->get()
            ->map(fn (Service $service) => [
                'id' => $service->id,
                'label' => $service->name_en,
            ])
            ->prepend(['id' => null, 'label' => '— No Link —'])
            ->toArray();
    }

    protected function rules(): array
    {
        return [
            'badge' => ['required', 'string', 'max:50'],
            'title_line_1' => ['required', 'string', 'max:100'],
            'title_line_2' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:500'],
            'btn_primary_text' => ['required', 'string', 'max:50'],
            'btn_primary_url' => ['required', 'string', 'max:2048', 'url'],
            'btn_secondary_text' => ['nullable', 'string', 'max:50'],
            'btn_secondary_url' => ['nullable', 'string', 'max:2048', 'url'],
            'image_path' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'service_id' => ['nullable', 'exists:services,id'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['boolean'],
            'is_featured' => ['boolean'],
        ];
    }

    public function openCreateForm(): void
    {
        $this->resetForm();
        $this->sort_order = $this->getNextSortOrder();
        $this->btn_primary_url = 'https://wa.me/51999999999'; // Default WhatsApp URL
        $this->btn_secondary_url = '/contacto'; // Internal default path
        $this->showForm = true;
    }

    public function openEditForm(int $slideId): void
    {
        $slide = HeroSlide::findOrFail($slideId);

        $this->slide = $slide;
        $this->isEdit = true;
        $this->fill([
            'badge' => $slide->badge,
            'title_line_1' => $slide->title_line_1,
            'title_line_2' => $slide->title_line_2,
            'description' => $slide->description,
            'btn_primary_text' => $slide->btn_primary_text,
            'btn_primary_url' => $slide->btn_primary_url,
            'btn_secondary_text' => $slide->btn_secondary_text,
            'btn_secondary_url' => $slide->btn_secondary_url,
            'service_id' => $slide->service_id,
            'sort_order' => $slide->sort_order,
            'is_active' => $slide->is_active,
            'is_featured' => $slide->is_featured,
        ]);
        $this->showForm = true;
    }

    public function closeForm(): void
    {
        $this->resetForm();
        $this->showForm = false;
    }

    public function confirmDelete(int $slideId): void
    {
        $this->slideToDelete = HeroSlide::findOrFail($slideId);
        $this->showDeleteModal = true;
    }

    public function deleteConfirmed(): void
    {
        if (! $this->slideToDelete) {
            return;
        }

        AdminMediaService::deleteImage($this->slideToDelete->image_path);
        $this->slideToDelete->delete();
        $this->slideToDelete = null;
        $this->showDeleteModal = false;

        session()->flash('success', 'Hero slide deleted successfully.');
    }

    public function save(): void
    {
        $validated = $this->validate();

        if ($this->image_path instanceof TemporaryUploadedFile) {
            if ($this->slide && $this->slide->image_path) {
                AdminMediaService::deleteImage($this->slide->image_path);
            }
            $validated['image_path'] = AdminMediaService::storeImage($this->image_path, 'hero-slides');
        } elseif ($this->isEdit && $this->slide) {
            $validated['image_path'] = $this->slide->image_path;
        } else {
            $validated['image_path'] = null;
        }

        // If setting as featured, unset other featured slides
        if ($validated['is_featured']) {
            HeroSlide::where('is_featured', true)->where('id', '!=', $this->slide?->id)->update(['is_featured' => false]);
        }

        if ($this->isEdit && $this->slide) {
            $this->slide->update($validated);
            session()->flash('success', 'Hero slide updated successfully.');
        } else {
            HeroSlide::query()->create($validated);
            session()->flash('success', 'Hero slide created successfully.');
        }

        $this->closeForm();
    }

    public function toggleActive(int $slideId): void
    {
        $slide = HeroSlide::findOrFail($slideId);
        $slide->update(['is_active' => ! $slide->is_active]);
    }

    public function toggleFeatured(int $slideId): void
    {
        $slide = HeroSlide::findOrFail($slideId);
        $newFeatured = ! $slide->is_featured;

        if ($newFeatured) {
            // Unset other featured slides
            HeroSlide::where('is_featured', true)->where('id', '!=', $slideId)->update(['is_featured' => false]);
        }

        $slide->update(['is_featured' => $newFeatured]);
    }

    public function moveUp(int $slideId): void
    {
        $slide = HeroSlide::findOrFail($slideId);
        $previous = HeroSlide::query()
            ->ordered()
            ->where('id', '!=', $slideId)
            ->where(function ($query) use ($slide) {
                $query->where('is_featured', $slide->is_featured)
                    ->where('sort_order', '<', $slide->sort_order);
            })
            ->orderByDesc('sort_order')
            ->first();

        if ($previous) {
            $slide->update(['sort_order' => $previous->sort_order]);
            $previous->update(['sort_order' => $slide->sort_order]);
        }
    }

    public function moveDown(int $slideId): void
    {
        $slide = HeroSlide::findOrFail($slideId);
        $next = HeroSlide::query()
            ->ordered()
            ->where('id', '!=', $slideId)
            ->where(function ($query) use ($slide) {
                $query->where('is_featured', $slide->is_featured)
                    ->where('sort_order', '>', $slide->sort_order);
            })
            ->orderBy('sort_order')
            ->first();

        if ($next) {
            $slide->update(['sort_order' => $next->sort_order]);
            $next->update(['sort_order' => $slide->sort_order]);
        }
    }

    private function getNextSortOrder(): int
    {
        return (int) HeroSlide::query()->max('sort_order') + 1;
    }

    public function resetForm(): void
    {
        $this->slide = null;
        $this->isEdit = false;
        $this->badge = '';
        $this->title_line_1 = '';
        $this->title_line_2 = '';
        $this->description = '';
        $this->btn_primary_text = '';
        $this->btn_primary_url = '';
        $this->btn_secondary_text = null;
        $this->btn_secondary_url = null;
        $this->image_path = null;
        $this->service_id = null;
        $this->sort_order = 0;
        $this->is_active = true;
        $this->is_featured = false;
    }

    public function render(): View
    {
        return view('livewire.admin.hero-carousel-manager.hero-carousel-manager-page', [
            'slides' => HeroSlide::query()->ordered()->get(),
            'services' => $this->services,
        ])
            ->layout('components.layouts.admin');
    }
}
