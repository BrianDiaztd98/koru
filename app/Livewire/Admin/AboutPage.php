<?php

namespace App\Livewire\Admin;

use App\Models\About;
use App\Services\AdminMediaService;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class AboutPage extends Component
{
    use WithFileUploads;

    public About $about;

    public ?TemporaryUploadedFile $image_1 = null;
    public ?TemporaryUploadedFile $image_2 = null;
    public ?TemporaryUploadedFile $image_3 = null;

    public function mount(): void
    {
        $this->about = About::query()->first() ?? new About();
    }

    protected function rules(): array
    {
        return [
            'about.title' => ['required', 'string', 'max:255'],
            'about.subtitle' => ['nullable', 'string', 'max:255'],
            'about.description' => ['nullable', 'string'],
            'about.philosophy' => ['required', 'string'],
            'about.vision' => ['required', 'string'],
            'about.feature_1_title' => ['nullable', 'string', 'max:255'],
            'about.feature_1_description' => ['nullable', 'string'],
            'about.feature_2_title' => ['nullable', 'string', 'max:255'],
            'about.feature_2_description' => ['nullable', 'string'],
            'image_1' => ['nullable', 'image', 'max:2048', 'mimes:jpg,jpeg,png,webp'],
            'image_2' => ['nullable', 'image', 'max:2048', 'mimes:jpg,jpeg,png,webp'],
            'image_3' => ['nullable', 'image', 'max:2048', 'mimes:jpg,jpeg,png,webp'],
        ];
    }

    public function save(): void
    {
        $validated = Arr::get($this->validate(), 'about', []);
        $this->handleUploadedImages($validated);

        if ($this->about->exists) {
            $this->about->update($validated);
        } else {
            $this->about = About::query()->create($validated);
        }

        session()->flash('success', 'About section saved successfully.');
        $this->mount();
    }

    private function handleUploadedImages(array &$validated): void
    {
        foreach (['image_1', 'image_2', 'image_3'] as $field) {
            if ($this->{$field} instanceof TemporaryUploadedFile) {
                AdminMediaService::deleteImage($this->about->{$field});
                $validated[$field] = AdminMediaService::storeImage($this->{$field}, 'about');
            }
        }
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.admin.about-page')
            ->layout('components.layouts.admin', [
                'title' => 'About Section',
                'activeTarget' => 'about',
            ]);
    }
}
