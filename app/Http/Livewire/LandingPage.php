<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class LandingPage extends Component
{
    public string $locale = 'en';

    public string $activePillar = 'recovery_performance';

    public function mount(): void
    {
        $this->locale = Session::get('locale', app()->getLocale() ?: 'en');
        App::setLocale($this->locale);
    }

    public function updatedLocale(string $value): void
    {
        $this->setLocale($value);
    }

    public function setLocale(string $locale): void
    {
        $locale = in_array($locale, ['en', 'es']) ? $locale : 'en';
        $this->locale = $locale;
        Session::put('locale', $locale);
        App::setLocale($locale);
    }

    public function setPillar(string $pillar): void
    {
        if (in_array($pillar, array_keys($this->pillarLabels), true)) {
            $this->activePillar = $pillar;
        }
    }

    protected function currentLocale(): string
    {
        return in_array(app()->getLocale(), ['en', 'es'], true) ? app()->getLocale() : 'en';
    }

    #[Computed]
    public function getServicesByPillarProperty(): array
    {
        return Service::query()
            ->where('active_status', true)
            ->orderByRaw("case when category = 'manual_therapy' then 1 when category = 'recovery_performance' then 2 when category = 'medical_services' then 3 when category = 'koru_at_home' then 4 else 5 end")
            ->orderBy('name_en')
            ->get()
            ->groupBy('category')
            ->map(fn ($group) => $group->map(fn (Service $service) => [
                'id' => $service->id,
                'slug' => $service->slug,
                'title' => $this->locale === 'es' ? $service->name_es : $service->name_en,
                'description' => $this->locale === 'es' ? $service->description_es : $service->description_en,
                'price' => number_format($service->price, 2),
                'duration' => $service->duration,
                'image' => $service->image_path ?: asset('img/carrucel/relaxing.jpg'),
            ])->toArray())
            ->toArray();
    }

    #[Computed]
    public function getBoosterShotsProperty(): array
    {
        return Service::query()
            ->where('active_status', true)
            ->where('category', 'booster_shots')
            ->orderBy('name_en')
            ->get()
            ->map(fn (Service $service) => [
                'id' => $service->id,
                'title' => $this->locale === 'es' ? $service->name_es : $service->name_en,
                'description' => $this->locale === 'es' ? $service->description_es : $service->description_en,
                'price' => number_format($service->price, 2),
            ])
            ->toArray();
    }

    #[Computed]
    public function getPackagesProperty(): array
    {
        return [
            [
                'name' => 'Basic',
                'price' => 120,
                'sessions' => 1,
                'validity' => null,
                'description' => 'Single session for targeted recovery or maintenance.',
            ],
            [
                'name' => 'Standard',
                'price' => 500,
                'sessions' => 5,
                'validity' => 'Valid for 8 weeks',
                'description' => 'Perfect for consistent weekly care. Ideal for ongoing recovery and performance optimization.',
            ],
            [
                'name' => 'Advanced',
                'price' => 950,
                'sessions' => 10,
                'validity' => 'Valid for 12 weeks',
                'description' => 'Best value for intensive programs. Designed for athletes and clients with specific recovery goals.',
            ],
            [
                'name' => 'Elite',
                'price' => 1800,
                'sessions' => 20,
                'validity' => 'Valid for 25 weeks',
                'description' => 'Premium package for maximum results. Includes priority scheduling and comprehensive recovery support.',
            ],
        ];
    }

    #[Computed]
    public function getHeaderNavItemsProperty(): array
    {
        return [
            ['label' => 'Education', 'href' => '#education'],
            ['label' => 'Team', 'href' => '#team'],
            ['label' => 'Location', 'href' => '#location'],
        ];
    }

    #[Computed]
    public function getIvDripsProperty(): array
    {
        return Service::query()
            ->where('active_status', true)
            ->where('category', 'iv_therapy')
            ->orderBy('name_en')
            ->get()
            ->map(fn (Service $service) => [
                'id' => $service->id,
                'title' => $this->locale === 'es' ? $service->name_es : $service->name_en,
                'description' => $this->locale === 'es' ? $service->description_es : $service->description_en,
                'duration' => $service->duration,
                'price' => number_format($service->price, 2),
                'icon' => $this->resolveIvIcon($service),
            ])
            ->toArray();
    }

    protected function resolveIvIcon(Service $service): string
    {
        $slug = strtolower($service->slug ?: $service->name_en);

        return match (true) {
            str_contains($slug, 'hydr') => 'hydration',
            str_contains($slug, 'perform') => 'performance',
            str_contains($slug, 'well') => 'wellness',
            default => 'drip',
        };
    }

    #[Computed]
    public function getActiveCoursesProperty(): array
    {
        return Course::query()
            ->where('active_status', true)
            ->whereDate('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->limit(6)
            ->get()
            ->map(fn (Course $course) => [
                'id' => $course->id,
                'title' => $this->locale === 'es' ? $course->title_es : $course->title_en,
                'description' => $this->locale === 'es' ? $course->description_es : $course->description_en,
                'ce_credits' => $course->ce_credits,
                'date' => $course->date->format('M j, Y'),
                'price' => number_format($course->price, 2),
            ])
            ->toArray();
    }

    #[Computed]
    public function getTeamMembersProperty(): array
    {
        $locale = $this->currentLocale();

        return TeamMember::query()
            ->where('active_status', true)
            ->orderBy('name')
            ->get()
            ->map(fn (TeamMember $member) => [
                'id' => $member->id,
                'name' => $member->name,
                'instagram' => $member->instagram_handle,
                'bio' => $locale === 'es' ? $member->bio_es : $member->bio_en,
                'specialty' => $locale === 'es' ? $member->specialty_es ?? $member->bio_es : $member->specialty_en ?? $member->bio_en,
                'image' => $member->image_path ?: asset('img/team/placeholder.png'),
            ])
            ->toArray();
    }

    #[Computed]
    public function getSiteSettingsProperty(): array
    {
        return SiteSetting::allSettings();
    }

    #[Computed]
    public function getLocalizedSettingsProperty(): array
    {
        $locale = $this->currentLocale();
        $settings = $this->siteSettings;

        return [
            'hero_headline' => $settings['hero_headline_'.$locale] ?? 'Pain free, better life',
            'hero_subtitle' => $settings['hero_subtitle_'.$locale] ?? 'Center of excellence in recovery and sports performance.',
            'phone' => $settings['phone'] ?? '+1 786-752-8054',
            'hours' => $settings['hours'] ?? 'Thu-Tue, 8am-8pm',
            'address' => $settings['address'] ?? '6405 NW 36th St, #100, Virginia Gardens FL 33166',
            'footer_disclaimer' => $settings['footer_disclaimer_'.$locale] ?? 'Insurance & self-pay options available.',
            'contact_email' => $settings['contact_email'] ?? 'info@korucenter.com',
            'social_instagram' => $settings['social_instagram'] ?? '',
            'social_facebook' => $settings['social_facebook'] ?? '',
            'footer_copyright' => $settings['footer_copyright_'.$locale] ?? '© '.date('Y').' Koru Center. All rights reserved.',
        ];
    }

    #[Computed]
    public function getPillarLabelsProperty(): array
    {
        return [
            'manual_therapy' => [
                'title' => $this->locale === 'es' ? 'Masajes Terapéuticos' : 'Massage Services',
                'summary' => $this->locale === 'es' ? 'Masaje clínico, prenatal, relajación profunda y recuperación manual.' : 'Clinical massage, prenatal care, deep relaxation, and manual recovery.',
            ],
            'recovery_performance' => [
                'title' => $this->locale === 'es' ? 'Terapia y Rendimiento' : 'Therapy Services',
                'summary' => $this->locale === 'es' ? 'Evaluación, rehabilitación terapéutica y tecnología avanzada de recuperación.' : 'Assessment, therapeutic rehab, and advanced recovery technology.',
            ],
            'medical_services' => [
                'title' => $this->locale === 'es' ? 'Servicios Médicos' : 'Medical Services',
                'summary' => $this->locale === 'es' ? 'Consultas médicas especializadas en metabolismo, endocrinología y valoración clínica.' : 'Specialized medical consultations in metabolism, endocrinology, and clinical assessment.',
            ],
            'koru_at_home' => [
                'title' => $this->locale === 'es' ? 'Koru en Casa' : 'Koru At Home',
                'summary' => $this->locale === 'es' ? 'Masaje terapéutico y recuperación avanzada en la comodidad de tu hogar.' : 'Therapeutic massage and advanced recovery in the comfort of your home.',
            ],
        ];
    }

    public function render()
    {
        return view('livewire.landing-page', [
            'pillarLabels' => $this->pillarLabels,
            'headerNavItems' => $this->headerNavItems,
            'servicesByPillar' => $this->servicesByPillar,
            'ivDrips' => $this->ivDrips,
            'boosterShots' => $this->boosterShots,
            'packages' => $this->packages,
            'localizedSettings' => $this->localizedSettings,
            'activeCourses' => $this->activeCourses,
            'teamMembers' => $this->teamMembers,
        ]);
    }
}
