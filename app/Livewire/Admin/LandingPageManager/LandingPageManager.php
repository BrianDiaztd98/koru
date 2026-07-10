<?php

namespace App\Livewire\Admin\LandingPageManager;

use App\Models\About;
use App\Models\LandingPageVisit;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Support\Collection;
use Livewire\Component;

class LandingPageManager extends Component
{
    public About $about;

    protected array $services;

    public array $categories;

    protected array $serviceGroups;

    public int $selectedYear;

    public function mount(): void
    {
        $this->selectedYear = (int) request()->query('year', now()->year);
        $this->about = About::query()->first() ?? new About;
        $this->categories = Service::categories();
        $this->serviceGroups = [
            'Service Pillars' => [
                'manual_therapy',
                'recovery_performance',
                'medical_services',
                'koru_at_home',
            ],
            'Other Services' => [
                'booster_shots',
                'iv_therapy',
            ],
        ];

        $this->services = Service::query()
            ->orderBy('name_en')
            ->get()
            ->groupBy('category')
            ->map(fn ($group) => $group->toArray())
            ->toArray();
    }

    public function getCategoryCountsProperty(): Collection
    {
        return collect(array_keys($this->categories))->mapWithKeys(function (string $key) {
            return [$key => count($this->services[$key] ?? [])];
        });
    }

    public function getPillarServicesProperty(): Collection
    {
        return collect($this->serviceGroups['Service Pillars'])
            ->flatMap(fn (string $category) => collect($this->services[$category] ?? []))
            ->map(fn (array $service) => [
                'service' => $service,
                'category_label' => $this->categories[$service['category']] ?? $service['category'],
            ]);
    }

    public function getTotalServicesCountProperty(): int
    {
        return array_sum(array_map('count', $this->services));
    }

    public function getTotalPackagesCountProperty(): int
    {
        return Package::query()->count();
    }

    public function getLandingPageVisitStatsProperty(): array
    {
        return [
            'total' => LandingPageVisit::totalVisitsForYear($this->selectedYear),
            'monthly' => LandingPageVisit::query()->monthlyStats($this->selectedYear),
            'availableYears' => LandingPageVisit::availableYears()->isNotEmpty()
                ? LandingPageVisit::availableYears()
                : collect([(int) now()->year]),
        ];
    }

    public function render()
    {
        return view('livewire.admin.management', [
            'categoryCounts' => $this->categoryCounts,
            'totalServicesCount' => $this->totalServicesCount,
            'totalPackagesCount' => $this->totalPackagesCount,
            'landingPageVisitStats' => $this->landingPageVisitStats,
            'selectedYear' => $this->selectedYear,
        ])
            ->layout('components.layouts.admin');
    }
}
