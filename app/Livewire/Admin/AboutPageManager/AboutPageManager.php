<?php

namespace App\Livewire\Admin\AboutPageManager;

use App\Models\About;
use App\Models\AboutGlanceItem;
use App\Services\AdminMediaService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class AboutPageManager extends Component
{
    use WithFileUploads;

    public ?About $about = null;

    public ?TemporaryUploadedFile $image_1 = null;

    public ?TemporaryUploadedFile $image_2 = null;

    public ?TemporaryUploadedFile $image_3 = null;

    public ?TemporaryUploadedFile $image_4 = null;

    public string $title = '';

    public ?string $subtitle = '';

    public string $description = '';

    public string $philosophy = '';

    public string $vision = '';

    public ?string $mission = '';

    public array $glanceItems = [];

    public bool $showDeleteModal = false;

    public function mount(): void
    {
        $this->about = About::query()->with('glanceItems')->first();

        if ($this->about) {
            $this->title = $this->about->title;
            $this->subtitle = $this->about->subtitle;
            $this->description = $this->about->description;
            $this->philosophy = $this->about->philosophy;
            $this->vision = $this->about->vision;
            $this->mission = $this->about->mission;

            $this->glanceItems = $this->about->glanceItems
                ->sortBy('order')
                ->map(fn (AboutGlanceItem $item) => [
                    'id' => $item->id,
                    'order' => $item->order,
                    'title' => $item->title,
                    'description' => $item->description,
                ])
                ->values()
                ->toArray();
        }

        if (empty($this->glanceItems)) {
            $this->initializeDefaultGlanceItems();
        }
    }

    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'subtitle' => ['nullable', 'string', 'max:150'],
            'description' => ['nullable', 'string', 'max:2000'],
            'philosophy' => ['required', 'string', 'max:2000'],
            'vision' => ['required', 'string', 'max:2000'],
            'mission' => ['nullable', 'string', 'max:2000'],
            'image_1' => ['nullable', 'image', 'max:2048', 'mimes:jpg,jpeg,png,webp'],
            'image_2' => ['nullable', 'image', 'max:2048', 'mimes:jpg,jpeg,png,webp'],
            'image_3' => ['nullable', 'image', 'max:2048', 'mimes:jpg,jpeg,png,webp'],
            'image_4' => ['nullable', 'image', 'max:2048', 'mimes:jpg,jpeg,png,webp'],
            'glanceItems' => ['nullable', 'array'],
            'glanceItems.*.title' => ['nullable', 'string', 'max:80'],
            'glanceItems.*.description' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function confirmDelete(): void
    {
        $this->showDeleteModal = true;
    }

    public function deleteConfirmed(): void
    {
        if (! $this->about) {
            return;
        }

        foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $field) {
            if ($this->about->{$field}) {
                AdminMediaService::deleteImage($this->about->{$field});
            }
        }

        $this->about->delete();
        $this->about = null;
        $this->showDeleteModal = false;

        session()->flash('success', 'About section deleted successfully.');
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
            'mission',
        ]);

        $this->handleUploadedImages($data);

        if ($this->about && $this->about->exists) {
            $this->about->update($data);
            session()->flash('success', 'About section updated successfully.');
        } else {
            $this->about = About::query()->create($data);
            session()->flash('success', 'About section created successfully.');
        }

        $this->syncGlanceItems();

        $this->mount();
    }

    private function handleUploadedImages(array &$data): void
    {
        foreach (['image_1', 'image_2', 'image_3', 'image_4'] as $field) {
            if ($this->{$field} instanceof TemporaryUploadedFile) {
                if ($this->about && $this->about->exists) {
                    AdminMediaService::deleteImage($this->about->{$field});
                }
                $data[$field] = AdminMediaService::storeImage($this->{$field}, 'about');
            }
        }
    }

    private function syncGlanceItems(): void
    {
        if (! $this->about) {
            return;
        }

        $this->about->glanceItems()->delete();

        foreach ($this->glanceItems as $index => $item) {
            $this->about->glanceItems()->create([
                'order' => $index + 1,
                'title' => $item['title'] ?? '',
                'description' => $item['description'] ?? '',
            ]);
        }
    }

    public function addGlanceItem(): void
    {
        $this->glanceItems[] = [
            'id' => null,
            'order' => count($this->glanceItems) + 1,
            'title' => '',
            'description' => '',
        ];
    }

    public function removeGlanceItem(int $index): void
    {
        unset($this->glanceItems[$index]);
        $this->glanceItems = array_values($this->glanceItems);
    }

    private function initializeDefaultGlanceItems(): void
    {
        $this->glanceItems = [
            [
                'id' => null,
                'order' => 1,
                'title' => 'Who we are',
                'description' => 'A wellness, recovery, therapy, and professional education center built around practical support and clinical standards.',
            ],
            [
                'id' => null,
                'order' => 2,
                'title' => 'What we do',
                'description' => 'Clinical massage, recovery technologies, IV Therapy, Booster Shots, KORU at Home, and continuing education.',
            ],
            [
                'id' => null,
                'order' => 3,
                'title' => 'Who we serve',
                'description' => 'Individuals seeking relief and wellness, active people focused on recovery, and professionals seeking education.',
            ],
            [
                'id' => null,
                'order' => 4,
                'title' => 'How we work',
                'description' => 'Attentive service, structured protocols, specialized techniques, and clear communication.',
            ],
            [
                'id' => null,
                'order' => 5,
                'title' => 'What sets us apart',
                'description' => 'We bring wellness, recovery, clinical care, and education together in one organized environment.',
            ],
            [
                'id' => null,
                'order' => 6,
                'title' => 'What KORU represents',
                'description' => 'New life, growth, strength, peace, and the possibility of moving forward with purpose.',
            ],
        ];
    }

    public function render(): View
    {
        return view('livewire.admin.about-page-manager.about-page-manager-page')
            ->layout('components.layouts.admin');
    }
}
