<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $categories = Service::categories();
        $activeCategory = $request->query('category');

        $query = Service::query();
        if ($activeCategory) {
            $query->where('category', $activeCategory);
        }

        $services = $query->orderBy('name_en')->paginate(20)->withQueryString();

        return view('livewire.admin.service-pillars.index', compact('services', 'categories', 'activeCategory'));
    }

    public function create(Request $request)
    {
        $defaultCategory = $request->query('category', 'manual_therapy');

        if ($defaultCategory === 'booster_shots') {
            return view('livewire.admin.booster-shots.create', [
                'categories' => Service::categories(),
                'defaultCategory' => $defaultCategory,
            ]);
        }

        if ($defaultCategory === 'iv_therapy') {
            return view('livewire.admin.iv-therapy.create', [
                'categories' => Service::categories(),
                'defaultCategory' => $defaultCategory,
            ]);
        }

        return view('livewire.admin.service-pillars.create', [
            'categories' => Service::categories(),
            'defaultCategory' => $defaultCategory,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateServiceRequest($request);
        $validated['slug'] = Str::slug($validated['name_en']);
        $validated['active_status'] = $request->boolean('active_status');

        if ($request->hasFile('image_path')) {
            File::ensureDirectoryExists(public_path('img/services'));
            $file = $request->file('image_path');
            $filename = Str::slug($validated['name_en']).'-'.time().'.'.$file->extension();
            $file->move(public_path('img/services'), $filename);
            $validated['image_path'] = 'img/services/'.$filename;
        }

        Service::query()->create($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function show(Service $service)
    {
        if ($service->category === 'booster_shots') {
            return view('livewire.admin.booster-shots.edit', [
                'service' => $service,
                'categories' => Service::categories(),
            ]);
        }

        if ($service->category === 'iv_therapy') {
            return view('livewire.admin.iv-therapy.edit', [
                'service' => $service,
                'categories' => Service::categories(),
            ]);
        }

        return view('livewire.admin.service-pillars.edit', [
            'service' => $service,
            'categories' => Service::categories(),
        ]);
    }

    public function edit(Service $service)
    {
        if ($service->category === 'booster_shots') {
            return view('livewire.admin.booster-shots.edit', [
                'service' => $service,
                'categories' => Service::categories(),
            ]);
        }

        if ($service->category === 'iv_therapy') {
            return view('livewire.admin.iv-therapy.edit', [
                'service' => $service,
                'categories' => Service::categories(),
            ]);
        }

        return view('livewire.admin.service-pillars.edit', [
            'service' => $service,
            'categories' => Service::categories(),
        ]);
    }

    public function update(Request $request, Service $service)
    {
        $validated = $this->validateServiceRequest($request);
        $validated['slug'] = Str::slug($validated['name_en']);
        $validated['active_status'] = $request->boolean('active_status');

        if ($request->hasFile('image_path')) {
            File::ensureDirectoryExists(public_path('img/services'));
            $file = $request->file('image_path');
            $filename = Str::slug($validated['name_en']).'-'.time().'.'.$file->extension();
            $file->move(public_path('img/services'), $filename);
            $validated['image_path'] = 'img/services/'.$filename;
        }

        $service->query()->update($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }

    private function validateServiceRequest(Request $request): array
    {
        return $request->validate([
            'name_en' => ['required', 'string', 'max:255'],
            'name_es' => ['required', 'string', 'max:255'],
            'description_en' => ['required', 'string'],
            'description_es' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'duration' => ['required', 'string', 'max:255'],
            'image_path' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'category' => ['required', 'string', 'in:'.implode(',', array_keys(Service::categories()))],
        ]);
    }

    private static function categories(): array
    {
        return [
            'manual_therapy' => 'Massage Services',
            'recovery_performance' => 'Therapy Services',
            'medical_services' => 'Medical Services',
            'koru_at_home' => 'Koru At Home',
            'booster_shots' => 'Booster Shots',
            'iv_therapy' => 'IV Therapy',
        ];
    }
}
