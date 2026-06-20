<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::query()
            ->orderBy('category')
            ->orderBy('name_en')
            ->paginate(20);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create', [
            'categories' => self::categories(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateServiceRequest($request);
        $validated['slug'] = Str::slug($validated['name_en']);
        $validated['active_status'] = $request->boolean('active_status');

        Service::query()->create($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function show(Service $service)
    {
        return view('admin.services.edit', [
            'service' => $service,
            'categories' => self::categories(),
        ]);
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', [
            'service' => $service,
            'categories' => self::categories(),
        ]);
    }

    public function update(Request $request, Service $service)
    {
        $validated = $this->validateServiceRequest($request);
        $validated['slug'] = Str::slug($validated['name_en']);
        $validated['active_status'] = $request->boolean('active_status');

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
            'image_path' => ['nullable', 'string', 'max:255'],
            'category' => ['required', 'string', 'in:'.implode(',', array_keys(self::categories()))],
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
        ];
    }
}
