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

    public ?About $about = null;

    public ?TemporaryUploadedFile $image_1 = null;
    public ?TemporaryUploadedFile $image_2 = null;
    public ?TemporaryUploadedFile $image_3 = null;

    public string $title = '';
    public ?string $subtitle = '';
    public string $description = '';
    public string $philosophy = '';
    public string $vision = '';
    public ?string $feature_1_title = '';
    public ?string $feature_1_description = '';
    public ?string $feature_2_title = '';
    public ?string $feature_2_description = '';

    public function mount(): void
    {
        $this->about = About::query()->first();

        if ($this->about) {
            $this->title = $this->about->title;
            $this->subtitle = $this->about->subtitle;
            $this->description = $this->about->description;
            $this->philosophy = $this->about->philosophy;
            $this->vision = $this->about->vision;
            $this->feature_1_title = $this->about->feature_1_title;
            $this->feature_1_description = $this->about->feature_1_description;
            $this->feature_2_title = $this->about->feature_2_title;
            $this->feature_2_description = $this->about->feature_2_description;
        }
    }

    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'philosophy' => ['required', 'string'],
            'vision' => ['required', 'string'],
            'feature_1_title' => ['nullable', 'string', 'max:255'],
            'feature_1_description' => ['nullable', 'string'],
            'feature_2_title' => ['nullable', 'string', 'max:255'],
            'feature_2_description' => ['nullable', 'string'],
            'image_1' => ['nullable', 'image', 'max:2048', 'mimes:jpg,jpeg,png,webp'],
            'image_2' => ['nullable', 'image', 'max:2048', 'mimes:jpg,jpeg,png,webp'],
            'image_3' => ['nullable', 'image', 'max:2048', 'mimes:jpg,jpeg,png,webp'],
        ];
    }

    public function save(): void
    {
        $validated = $this->validate();

        $data = Arr::only($validated, [
            'title',
            'subtitle',
            'description',
            'philosophy',
            'vision',
            'feature_1_title',
            'feature_1_description',
            'feature_2_title',
            'feature_2_description',
        ]);

        $this->handleUploadedImages($data);

        if ($this->about && $this->about->exists) {
            $this->about->update($data);
        } else {
            $this->about = About::query()->create($data);
        }

        session()->flash('success', 'About section saved successfully.');
        $this->mount();
    }

    private function handleUploadedImages(array &$data): void
    {
        foreach (['image_1', 'image_2', 'image_3'] as $field) {
            if ($this->{$field} instanceof TemporaryUploadedFile) {
                if ($this->about && $this->about->exists) {
                    AdminMediaService::deleteImage($this->about->{$field});
                }
                $data[$field] = AdminMediaService::storeImage($this->{$field}, 'about');
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
