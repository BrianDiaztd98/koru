<?php

namespace App\Livewire\Admin\ServiceManager;

use App\Models\Service;
use App\Services\AdminMediaService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ServiceManager extends Component
{
    use WithFileUploads;
    use WithPagination;

    public ?Service $service = null;

    public ?Service $serviceToDelete = null;

    public string $category = 'manual_therapy';

    public string $filterCategory = 'manual_therapy';

    public int $perPage = 5;

    public string $name_en = '';

    public string $description_en = '';

    public string $duration = '';

    public string $price = '';

    public bool $active_status = true;

    public bool $discount_eligible = false;

    public bool $is_featured = false;

    public bool $is_best_seller = false;

    public ?TemporaryUploadedFile $image_path = null;

    public array $categories = [];

    public array $imageCategories = [
        'manual_therapy',
        'recovery_performance',
        'medical_services',
        'koru_at_home',
    ];

    public bool $showForm = false;

    public bool $showDeleteModal = false;

    protected string $paginationTheme = 'tailwind';

    protected array $queryString = [
        'filterCategory' => ['except' => 'manual_therapy'],
    ];

    public bool $isEdit = false;

    public function mount(?Service $service = null, ?string $category = null): void
    {
        $this->categories = Service::categories();
        if (! array_key_exists($this->filterCategory, $this->categories)) {
            $this->filterCategory = 'manual_therapy';
        }
        $this->category = $service ? $service->category : ($category ?? 'manual_therapy');
        $this->service = $service;
        $this->isEdit = $service !== null;
        $this->showForm = request()->routeIs('admin.services.create') || request()->routeIs('admin.services.edit');

        if ($this->service) {
            $this->fill([
                'name_en' => $service->name_en,
                'description_en' => $service->description_en,
                'duration' => $service->duration,
                'price' => (string) $service->price,
                'active_status' => $service->active_status,
                'category' => $service->category,
                'discount_eligible' => (bool) $service->discount_eligible,
                'is_featured' => (bool) $service->is_featured,
                'is_best_seller' => (bool) $service->is_best_seller,
            ]);
        }
    }

    protected function rules(): array
    {
        return [
            'name_en' => ['required', 'string', 'max:120'],
            'description_en' => ['required', 'string', 'max:3000'],
            'duration' => ['required', 'string', 'max:50'],
            'price' => ['required', 'numeric', 'min:0', 'max:999999.99'],
            'category' => ['required', 'string', 'in:'.implode(',', array_keys($this->categories))],
            'image_path' => ['nullable', 'image', 'max:4096', 'mimes:jpg,jpeg,png,webp'],
            'active_status' => ['boolean'],
            'discount_eligible' => ['boolean'],
            'is_featured' => ['boolean'],
            'is_best_seller' => ['boolean'],
        ];
    }

    public function updatingFilterCategory(): void
    {
        if (app()->environment('local')) {
            logger()->info('updatingFilterCategory', ['newValue' => $this->filterCategory]);
        }
        $this->resetPage();
    }

    public function openCreateForm(): void
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function openEditForm(int $serviceId): void
    {
        $service = Service::findOrFail($serviceId);

        $this->service = $service;
        $this->isEdit = true;
        $this->fill([
            'name_en' => $service->name_en,
            'description_en' => $service->description_en,
            'duration' => $service->duration,
            'price' => (string) $service->price,
            'active_status' => $service->active_status,
            'category' => $service->category,
            'discount_eligible' => (bool) $service->discount_eligible,
            'is_featured' => (bool) $service->is_featured,
            'is_best_seller' => (bool) $service->is_best_seller,
        ]);
        $this->showForm = true;
    }

    public function closeForm(): void
    {
        $this->resetForm();
        $this->showForm = false;

        if (request()->routeIs('admin.services.create') || request()->routeIs('admin.services.edit')) {
            $this->redirectRoute('admin.services.index');
        }
    }

    public function openCreateModal(): void
    {
        $this->openCreateForm();
    }

    public function openEditModal(int $serviceId): void
    {
        $this->openEditForm($serviceId);
    }

    public function closeFormModal(): void
    {
        $this->closeForm();
    }

    public function confirmDelete(int $serviceId): void
    {
        $this->serviceToDelete = Service::findOrFail($serviceId);
        $this->showDeleteModal = true;
    }

    public function deleteConfirmed(): void
    {
        if (! $this->serviceToDelete) {
            return;
        }

        AdminMediaService::deleteImage($this->serviceToDelete->image_path);
        $this->serviceToDelete->delete();
        $this->serviceToDelete = null;
        $this->showDeleteModal = false;

        session()->flash('success', 'Service deleted successfully.');
    }

    public function save(): void
    {
        logger()->info('ServiceManager::save called', [
            'image_path_type' => gettype($this->image_path),
            'image_path_class' => $this->image_path ? get_class($this->image_path) : 'null',
            'image_path_instanceof' => $this->image_path instanceof TemporaryUploadedFile,
            'category' => $this->category,
            'isImageCategory' => $this->isImageCategory(),
        ]);

        $validated = $this->validate();
        $validated['slug'] = Str::slug($validated['name_en']);
        $validated['category'] = $this->category;
        $validated['active_status'] = $this->active_status;
        $validated['discount_eligible'] = $this->discount_eligible;
        $validated['is_featured'] = $this->canFeatureService() && $this->is_featured;
        $validated['is_best_seller'] = $validated['is_featured'] && $this->is_best_seller;

        if ($validated['is_featured']) {
            $featuredCount = Service::query()
                ->where('is_featured', true)
                ->when($this->service, fn ($query) => $query->whereKeyNot($this->service->id))
                ->count() + 1;

            if ($featuredCount > 3) {
                $this->addError('is_featured', 'You can feature a maximum of 3 services.');

                return;
            }
        }

        if ($validated['is_best_seller']) {
            $featuredCount = Service::query()
                ->where('is_featured', true)
                ->when($this->service, fn ($query) => $query->whereKeyNot($this->service->id))
                ->count() + 1;
            $bestSellerCount = Service::query()
                ->where('is_best_seller', true)
                ->when($this->service, fn ($query) => $query->whereKeyNot($this->service->id))
                ->count();

            if ($bestSellerCount >= min(3, $featuredCount)) {
                $this->addError('is_best_seller', 'You can mark up to the number of Featured services as Most Seller.');

                return;
            }
        }

        if ($this->isImageCategory()) {
            if ($this->image_path instanceof TemporaryUploadedFile) {
                if ($this->service) {
                    AdminMediaService::deleteImage($this->service->image_path);
                }
                $validated['image_path'] = AdminMediaService::storeImage($this->image_path, 'services');
            }
        } else {
            if ($this->service && $this->service->image_path) {
                AdminMediaService::deleteImage($this->service->image_path);
            }
            $validated['image_path'] = null;
        }

        if ($this->isEdit && $this->service) {
            $this->service->update($validated);
            session()->flash('success', 'Service updated successfully.');
        } else {
            Service::query()->create($validated);
            session()->flash('success', 'Service created successfully.');
        }

        $this->closeForm();
    }

    public function delete(Service $service): void
    {
        AdminMediaService::deleteImage($service->image_path);
        $service->delete();

        session()->flash('success', 'Service deleted successfully.');

        $routeParams = [];

        if ($this->filterCategory !== 'all') {
            $routeParams['category'] = $this->filterCategory;
        }

        $this->redirectRoute('admin.services.index', $routeParams);
    }

    public function toggleFeatured(int $serviceId): void
    {
        $service = Service::findOrFail($serviceId);

        if (! $this->canFeatureCategory($service->category)) {
            return;
        }

        $newFeatured = ! $service->is_featured;

        if ($newFeatured) {
            if (Service::query()->where('is_featured', true)->count() >= 3) {
                session()->flash('error', 'You can feature a maximum of 3 services.');

                return;
            }
        }

        $service->update(['is_featured' => $newFeatured]);

        if (! $newFeatured && $service->is_best_seller) {
            $service->update(['is_best_seller' => false]);
        }
    }

    public function toggleBestSeller(int $serviceId): void
    {
        $service = Service::findOrFail($serviceId);

        if (! $this->canFeatureCategory($service->category) || ! $service->is_featured) {
            return;
        }

        $newBestSeller = ! $service->is_best_seller;

        if ($newBestSeller) {
            $featuredCount = Service::query()
                ->where('is_featured', true)
                ->count();
            $bestSellerCount = Service::query()
                ->where('is_best_seller', true)
                ->count();

            if ($bestSellerCount >= min(3, $featuredCount)) {
                session()->flash('error', 'You can mark up to the number of Featured services as Most Seller.');

                return;
            }
        }

        $service->update(['is_best_seller' => $newBestSeller]);
    }

    public function resetForm(): void
    {
        $this->service = null;
        $this->isEdit = false;
        $this->name_en = '';
        $this->description_en = '';
        $this->duration = '';
        $this->price = '';
        $this->active_status = true;
        $this->image_path = null;
        $this->category = $this->filterCategory;
        $this->discount_eligible = false;
        $this->is_featured = false;
        $this->is_best_seller = false;
    }

    private function loadServices(): LengthAwarePaginator
    {
        if (app()->environment('local')) {
            logger()->info('loadServices', ['filterCategory' => $this->filterCategory]);
        }

        $query = Service::query();

        $query->where('category', $this->filterCategory);

        return $query->orderByDesc('is_featured')->orderBy('category')->orderBy('name_en')->paginate($this->perPage);
    }

    private function isImageCategory(): bool
    {
        return in_array($this->category, $this->imageCategories, true);
    }

    public function canFeatureService(): bool
    {
        return $this->canFeatureCategory($this->category);
    }

    public function canFeatureCategory(string $category): bool
    {
        return ! in_array($category, ['iv_therapy', 'booster_shots'], true);
    }

    public function render(): View
    {
        if (app()->environment('local')) {
            logger()->info('ServiceManagerPage render', ['filterCategory' => $this->filterCategory]);
        }

        return view('livewire.admin.service-manager.service-manager-page', [
            'services' => $this->loadServices(),
        ])
            ->layout('components.layouts.admin');
    }
}
