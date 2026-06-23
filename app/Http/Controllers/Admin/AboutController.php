<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUpdateRequest;
use App\Models\About;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::query()->first() ?? new About();

        return view('admin.about.index', compact('about'));
    }

    public function create()
    {
        $about = About::query()->first();

        if ($about) {
            return redirect()
                ->route('admin.about.edit')
                ->with('info', 'About section already exists. You can only edit the existing record.');
        }

        return view('admin.about.create', ['about' => new About()]);
    }

    public function store(AboutUpdateRequest $request): RedirectResponse
    {
        $about = About::query()->first();

        if ($about) {
            return redirect()
                ->route('admin.about.edit')
                ->with('error', 'Cannot create new About record. A record already exists. Please edit the existing one.');
        }

        $validated = $request->validated();

        $this->handleImageUploads($validated);

        About::query()->create($validated);

        return redirect()
            ->route('admin.about.index')
            ->with('success', 'About section created successfully.');
    }

    public function edit()
    {
        $about = About::query()->first();

        // Always pass an About instance to the view
        $about = $about ?? new About();

        return view('admin.about.edit', compact('about'));
    }

    public function update(AboutUpdateRequest $request): RedirectResponse
    {
        $about = About::query()->first();
        $validated = $request->validated();

        if ($about) {
            $this->handleImageUploads($validated, $about);
            $about->update($validated);

            return redirect()
                ->route('admin.about.index')
                ->with('success', 'About section updated successfully.');
        }

        $this->handleImageUploads($validated);
        About::query()->create($validated);

        return redirect()
            ->route('admin.about.index')
            ->with('success', 'About section created successfully.');
    }

    public function destroy(): RedirectResponse
    {
        $about = About::query()->first();

        if (! $about) {
            return redirect()
                ->route('admin.about.index')
                ->with('error', 'No About record found to delete.');
        }

        // Delete associated images from storage
        foreach (['image_1', 'image_2', 'image_3'] as $imageField) {
            if ($about->$imageField) {
                Storage::delete($about->$imageField);
            }
        }

        $about->delete();

        return redirect()
            ->route('admin.about.index')
            ->with('success', 'About section deleted successfully.');
    }

    private function handleImageUploads(array &$validated, ?About $about = null): void
    {
        foreach (['image_1', 'image_2', 'image_3'] as $imageField) {
            $uploadedFile = request()->file($imageField);

            if ($uploadedFile) {
                // Delete old image if exists
                if ($about && $about->$imageField) {
                    Storage::delete($about->$imageField);
                }

                // Store new image
                $path = $uploadedFile->store($imageField, 'public');
                $validated[$imageField] = $path;
            } else {
                // Keep existing image if no new one uploaded
                unset($validated[$imageField]);
            }
        }
    }
}