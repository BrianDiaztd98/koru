<?php

namespace App\Livewire\Admin\PackageManager;

use App\Models\Package;
use App\Models\PackageTerm;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class PackageManagerPage extends Component
{
    use WithPagination;

    public ?Package $package = null;

    public ?Package $packageToDelete = null;

    public int $perPage = 10;

    public string $name_en = '';

    public string $name_es = '';

    public string $description_en = '';

    public string $description_es = '';

    public string $price = '';

    public int $sessions = 1;

    public ?string $validity = null;

    public int $sort_order = 0;

    public bool $active_status = true;

    public bool $showFormModal = false;

    public bool $showDeleteModal = false;

    public ?PackageTerm $termToEdit = null;

    public string $term_content = '';

    public int $term_sort_order = 0;

    public bool $term_active_status = true;

    public bool $showTermModal = false;

    protected string $paginationTheme = 'tailwind';

    public bool $isEdit = false;

    public function mount(?Package $package = null): void
    {
        $this->package = $package;
        $this->isEdit = $package !== null;
        $this->showFormModal = request()->routeIs('admin.packages.create') || request()->routeIs('admin.packages.edit');

        if ($this->package) {
            $this->fill([
                'name_en' => $package->name_en,
                'name_es' => $package->name_es,
                'description_en' => $package->description_en,
                'description_es' => $package->description_es,
                'price' => (string) $package->price,
                'sessions' => (int) $package->sessions,
                'validity' => $package->validity,
                'sort_order' => (int) $package->sort_order,
                'active_status' => (bool) $package->active_status,
            ]);
        }
    }

    protected function rules(): array
    {
        return [
            'name_en' => ['required', 'string', 'max:255'],
            'name_es' => ['required', 'string', 'max:255'],
            'description_en' => ['nullable', 'string'],
            'description_es' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'sessions' => ['required', 'integer', 'min:1'],
            'validity' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'active_status' => ['boolean'],
        ];
    }

    public function openCreateModal(): void
    {
        $this->resetForm();
        $this->showFormModal = true;
        $this->sort_order = (Package::max('sort_order') ?? 0) + 1;
    }

    public function openEditModal(int $packageId): void
    {
        $package = Package::findOrFail($packageId);

        $this->package = $package;
        $this->isEdit = true;
        $this->fill([
            'name_en' => $package->name_en,
            'name_es' => $package->name_es,
            'description_en' => $package->description_en,
            'description_es' => $package->description_es,
            'price' => (string) $package->price,
            'sessions' => (int) $package->sessions,
            'validity' => $package->validity,
            'sort_order' => (int) $package->sort_order,
            'active_status' => (bool) $package->active_status,
        ]);
        $this->showFormModal = true;
    }

    public function closeFormModal(): void
    {
        $this->resetForm();
        $this->showFormModal = false;
    }

    public function confirmDelete(int $packageId): void
    {
        $this->packageToDelete = Package::findOrFail($packageId);
        $this->showDeleteModal = true;
    }

    public function deleteConfirmed(): void
    {
        if (! $this->packageToDelete) {
            return;
        }

        $this->packageToDelete->delete();
        $this->packageToDelete = null;
        $this->showDeleteModal = false;

        session()->flash('success', 'Package deleted successfully.');
    }

    public function save(): void
    {
        $validated = $this->validate();
        $validated['slug'] = $this->generateUniqueSlug($validated['name_en']);
        $validated['active_status'] = $this->active_status;

        if (! $this->isEdit) {
            $maxSort = Package::max('sort_order') ?? 0;

            if (empty($validated['sort_order']) || $validated['sort_order'] <= $maxSort) {
                $validated['sort_order'] = $maxSort + 1;
            }
        }

        if ($this->isEdit && $this->package) {
            $this->package->update($validated);
            session()->flash('success', 'Package updated successfully.');
        } else {
            Package::query()->create($validated);
            session()->flash('success', 'Package created successfully.');
        }

        $this->closeFormModal();
    }

    private function generateUniqueSlug(string $nameEn): string
    {
        $baseSlug = Str::slug($nameEn);
        $slug = $baseSlug;
        $suffix = 1;

        $query = Package::query();

        if ($this->isEdit && $this->package) {
            $query->where('id', '!=', $this->package->id);
        }

        while ($query->where('slug', $slug)->exists()) {
            $slug = $baseSlug.'-'.$suffix++;
        }

        return $slug;
    }

    public function delete(Package $package): void
    {
        $package->delete();

        session()->flash('success', 'Package deleted successfully.');

        $this->redirectRoute('admin.packages.index');
    }

    public function resetForm(): void
    {
        $this->package = null;
        $this->isEdit = false;
        $this->name_en = '';
        $this->name_es = '';
        $this->description_en = '';
        $this->description_es = '';
        $this->price = '';
        $this->sessions = 1;
        $this->validity = null;
        $this->sort_order = 0;
        $this->active_status = true;
    }

    private function loadPackages(): LengthAwarePaginator
    {
        return Package::query()
            ->orderBy('sort_order')
            ->orderBy('name_en')
            ->paginate($this->perPage);
    }

    public function getTermsProperty(): array
    {
        return PackageTerm::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->toArray();
    }

    public function openCreateTermModal(): void
    {
        $this->resetTermForm();
        $this->showTermModal = true;
        $this->term_sort_order = (PackageTerm::max('sort_order') ?? 0) + 1;
    }

    public function openEditTermModal(int $termId): void
    {
        $term = PackageTerm::findOrFail($termId);

        $this->termToEdit = $term;
        $this->term_content = $term->content;
        $this->term_sort_order = (int) $term->sort_order;
        $this->term_active_status = (bool) $term->active_status;
        $this->showTermModal = true;
    }

    public function closeTermModal(): void
    {
        $this->resetTermForm();
        $this->showTermModal = false;
    }

    public function saveTerm(): void
    {
        $validated = $this->validate([
            'term_content' => ['required', 'string'],
            'term_sort_order' => ['required', 'integer', 'min:0'],
            'term_active_status' => ['boolean'],
        ]);

        $data = [
            'content' => $validated['term_content'],
            'sort_order' => $validated['term_sort_order'],
            'active_status' => $validated['term_active_status'],
        ];

        if ($this->termToEdit) {
            $this->termToEdit->update($data);
            session()->flash('success', 'Package term updated successfully.');
        } else {
            PackageTerm::query()->create($data);
            session()->flash('success', 'Package term created successfully.');
        }

        $this->closeTermModal();
    }

    public function confirmDeleteTerm(int $termId): void
    {
        $this->termToEdit = PackageTerm::findOrFail($termId);
        $this->showDeleteModal = true;
    }

    public function deleteTermConfirmed(): void
    {
        if (! $this->termToEdit) {
            return;
        }

        $this->termToEdit->delete();
        $this->termToEdit = null;
        $this->showDeleteModal = false;

        session()->flash('success', 'Package term deleted successfully.');
    }

    private function resetTermForm(): void
    {
        $this->termToEdit = null;
        $this->term_content = '';
        $this->term_sort_order = 0;
        $this->term_active_status = true;
    }

    public function render(): View
    {
        return view('livewire.admin.package-manager.package-manager-page', [
            'packages' => $this->loadPackages(),
            'terms' => $this->getTermsProperty(),
        ])
            ->layout('components.layouts.admin', [
                'title' => 'Package Manager',
            ]);
    }
}
