<?php

namespace App\Livewire\Admin\ServiceManager;

use App\Models\Service;
use App\Services\AdminMediaService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ServiceManagerPage extends Component
{
    use WithFileUploads;
    use WithPagination;

    public ?Service $service = null;

    public ?Service $serviceToDelete = null;

    public string $category = 'manual_therapy';

    public string $filterCategory = 'all';

    public int $perPage = 5;

    public string $name_en = '';

    public string $name_es = '';

    public string $description_en = '';

    public string $description_es = '';

    public string $duration = '';

    public string $price = '';

    public bool $active_status = true;

    public ?TemporaryUploadedFile $image_path = null;

    public array $categories = [];

    public array $imageCategories = [
        'manual_therapy',
        'recovery_performance',
        'medical_services',
        'koru_at_home',
    ];

    public bool $showFormModal = false;

    public bool $showDeleteModal = false;

    protected string $paginationTheme = 'tailwind';

    protected array $queryString = [
        'filterCategory' => ['except' => 'all'],
    ];

    public bool $isEdit = false;

    public function mount(?Service $service = null, ?string $category = null): void
    {
        $this->categories = Service::categories();
        $this->category = $service ? $service->category : ($category ?? 'manual_therapy');
        $this->service = $service;
        $this->isEdit = $service !== null;
        $this->showFormModal = request()->routeIs('admin.services.create') || request()->routeIs('admin.services.edit');

        if ($this->service) {
            $this->fill([
                'name_en' => $service->name_en,
                'name_es' => $service->name_es,
                'description_en' => $service->description_en,
                'description_es' => $service->description_es,
                'duration' => $service->duration,
                'price' => (string) $service->price,
                'active_status' => $service->active_status,
                'category' => $service->category,
            ]);
        }
    }

    protected function rules(): array
    {
        return [
            'name_en' => ['required', 'string', 'max:255'],
            'name_es' => ['required', 'string', 'max:255'],
            'description_en' => ['required', 'string'],
            'description_es' => ['required', 'string'],
            'duration' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'category' => ['required', 'string', 'in:'.implode(',', array_keys($this->categories))],
            'image_path' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'active_status' => ['boolean'],
        ];
    }

    public function updatingFilterCategory(): void
    {
        if (app()->environment('local')) {
            logger()->info('updatingFilterCategory', ['newValue' => $this->filterCategory]);
        }
        $this->resetPage();
    }

    public function openCreateModal(): void
    {
        $this->resetForm();
        $this->showFormModal = true;
    }

    public function openEditModal(int $serviceId): void
    {
        $service = Service::findOrFail($serviceId);

        $this->service = $service;
        $this->isEdit = true;
        $this->fill([
            'name_en' => $service->name_en,
            'name_es' => $service->name_es,
            'description_en' => $service->description_en,
            'description_es' => $service->description_es,
            'duration' => $service->duration,
            'price' => (string) $service->price,
            'active_status' => $service->active_status,
            'category' => $service->category,
        ]);
        $this->showFormModal = true;
    }

    public function closeFormModal(): void
    {
        $this->resetForm();
        $this->showFormModal = false;
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
        $validated = $this->validate();
        $validated['slug'] = Str::slug($validated['name_en']);
        $validated['category'] = $this->category;
        $validated['active_status'] = $this->active_status;

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

        $this->closeFormModal();
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

    public function resetForm(): void
    {
        $this->service = null;
        $this->isEdit = false;
        $this->name_en = '';
        $this->name_es = '';
        $this->description_en = '';
        $this->description_es = '';
        $this->duration = '';
        $this->price = '';
        $this->active_status = true;
        $this->image_path = null;
        $this->category = $this->filterCategory === 'all' ? 'manual_therapy' : $this->filterCategory;
    }

    private function loadServices(): LengthAwarePaginator
    {
        if (app()->environment('local')) {
            logger()->info('loadServices', ['filterCategory' => $this->filterCategory]);
        }

        $query = Service::query();

        if ($this->filterCategory !== 'all') {
            $query->where('category', $this->filterCategory);
        }

        return $query->orderBy('category')->orderBy('name_en')->paginate($this->perPage);
    }

    private function isImageCategory(): bool
    {
        return in_array($this->category, $this->imageCategories, true);
    }

    public function render(): View
    {
        if (app()->environment('local')) {
            logger()->info('ServiceManagerPage render', ['filterCategory' => $this->filterCategory]);
        }

        return view('livewire.admin.service-manager.service-manager-page', [
            'services' => $this->loadServices(),
        ])
            ->layout('components.layouts.admin', [
                'title' => 'Service Manager',
                'activeTarget' => 'services',
            ]);
    }
}
