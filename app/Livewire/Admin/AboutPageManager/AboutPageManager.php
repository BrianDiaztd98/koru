<?php

namespace App\Livewire\Admin\AboutPageManager;

use App\Models\About;
use App\Models\AboutGlanceItem;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Livewire\Component;

class AboutPageManager extends Component
{
    public ?About $about = null;

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
