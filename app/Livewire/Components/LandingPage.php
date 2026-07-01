<?php

namespace App\Livewire\Components;

use App\Models\About;
use App\Models\Course;
use App\Models\Package;
use App\Models\PackageTerm;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class LandingPage extends Component
{
    public string $locale = 'en';

    public array $headerNavItems = [];

    public function mount(): void
    {
        $this->locale = Session::get('locale', app()->getLocale() ?: 'en');
        $this->headerNavItems = $this->buildHeaderNavItems();
        App::setLocale($this->locale);
    }

    public function updatedLocale(string $value): void
    {
        $this->setLocale($value);
    }

    public function setLocale(string $locale): void
    {
        $locale = in_array($locale, ['en', 'es'], true) ? $locale : 'en';
        $this->locale = $locale;
        Session::put('locale', $locale);
        App::setLocale($locale);
    }

    protected function currentLocale(): string
    {
        return in_array(app()->getLocale(), ['en', 'es'], true) ? app()->getLocale() : 'en';
    }

    protected function buildHeaderNavItems(): array
    {
        $locale = $this->locale;

        return [
            ['label' => $locale === 'es' ? 'Nosotros' : 'About', 'href' => '#about-us'],
            ['label' => $locale === 'es' ? 'Servicios' : 'Services', 'href' => '#services'],
            ['label' => $locale === 'es' ? 'Educación' : 'Education', 'href' => '#education'],
            ['label' => $locale === 'es' ? 'Equipo' : 'Team', 'href' => '#team'],
            ['label' => $locale === 'es' ? 'Ubicación' : 'Location', 'href' => '#location'],
        ];
    }

    protected function t(string $en, string $es): string
    {
        return $this->locale === 'es' ? $es : $en;
    }

    #[Computed]
    public function getHeroSlidesProperty(): array
    {
        return [
            [
                'id' => 0,
                'badge' => $this->t('Wellness & Performance', 'Bienestar y Rendimiento'),
                'title_line_1' => $this->t('Relaxing Massage', 'Masaje Relajante'),
                'title_line_2' => $this->t('Total Recovery', 'Recuperación Total'),
                'description' => $this->t('Advanced therapeutic techniques designed to relieve muscle tension, reduce stress levels, and significantly improve joint mobility.', 'Técnicas terapéuticas avanzadas diseñadas para aliviar la tensión muscular, reducir los niveles de estrés y mejorar significativamente la movilidad articular.'),
                'btn_primary_text' => $this->t('Book a Session', 'Reservar Sesión'),
                'btn_primary_url' => 'https://wa.me/17867528054',
                'btn_secondary_text' => $this->t('View Services', 'Ver Servicios'),
                'btn_secondary_url' => '#services',
                'image' => asset('img/carrucel/relaxing.jpg'),
            ],
            [
                'id' => 1,
                'badge' => $this->t('Advanced Recovery', 'Recuperación Avanzada'),
                'title_line_1' => 'Normatec',
                'title_line_2' => $this->t('Technology', 'Tecnología'),
                'description' => $this->t('Dynamic sequential compression bio-mechanisms to optimize blood flow, accelerate muscle clearance, and reduce inflammation effortlessly.', 'Mecanismos biomecánicos de compresión secuencial dinámica para optimizar el flujo sanguíneo, acelerar la eliminación muscular y reducir la inflamación sin esfuerzo.'),
                'btn_primary_text' => $this->t('Book No Hands Session', 'Reservar Sesión No Hands'),
                'btn_primary_url' => 'https://wa.me/17867528054',
                'btn_secondary_text' => $this->t('View Services', 'Ver Servicios'),
                'btn_secondary_url' => '#services',
                'image' => asset('img/carrucel/normatec.png'),
            ],
            [
                'id' => 2,
                'badge' => $this->t('Total Regeneration', 'Regeneración Total'),
                'title_line_1' => $this->t('Super', 'Súper'),
                'title_line_2' => $this->t('Recovery Protocol', 'Protocolo de Recuperación'),
                'description' => $this->t('Synergistic red light therapy and cold plunge contrast routines engineered for deep cellular regeneration and elite performance.', 'Rutinas sinérgicas de terapia de luz roja y contraste de inmersión en frío diseñadas para la regeneración celular profunda y el rendimiento de élite.'),
                'btn_primary_text' => $this->t('Book Super Recovery', 'Reservar Súper Recuperación'),
                'btn_primary_url' => 'https://wa.me/17867528054',
                'btn_secondary_text' => $this->t('View Services', 'Ver Servicios'),
                'btn_secondary_url' => '#services',
                'image' => asset('img/carrucel/luzroja.webp'),
            ],
        ];
    }

    #[Computed]
    public function getAboutDataProperty(): array
    {
        $data = About::getAboutData();
        $data['has_real_data'] = About::query()->exists();

        return $data;
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
        $locale = $this->locale;

        return Package::query()
            ->where('active_status', true)
            ->orderBy('sort_order')
            ->get()
            ->map(fn (Package $package) => [
                'id' => $package->id,
                'name' => $locale === 'es' ? $package->name_es : $package->name_en,
                'price' => $package->price,
                'sessions' => $package->sessions,
                'validity' => $package->validity,
                'description' => $locale === 'es' ? $package->description_es : $package->description_en,
            ])
            ->toArray();
    }

    #[Computed]
    public function getPackageTermsProperty(): array
    {
        return PackageTerm::query()
            ->where('active_status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(fn (PackageTerm $term) => [
                'id' => $term->id,
                'content' => $term->content,
            ])
            ->toArray();
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
        $locale = $this->locale;

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
        $locale = $this->locale;
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
        $locale = $this->locale;

        return [
            'manual_therapy' => [
                'title' => $locale === 'es' ? 'Masajes Terapéuticos' : 'Massage Services',
                'summary' => $locale === 'es' ? 'Masaje clínico, prenatal, relajación profunda y recuperación manual.' : 'Clinical massage, prenatal care, deep relaxation, and manual recovery.',
            ],
            'recovery_performance' => [
                'title' => $locale === 'es' ? 'Terapia y Rendimiento' : 'Therapy Services',
                'summary' => $locale === 'es' ? 'Evaluación, rehabilitación terapéutica y tecnología avanzada de recuperación.' : 'Assessment, therapeutic rehab, and advanced recovery technology.',
            ],
            'medical_services' => [
                'title' => $locale === 'es' ? 'Servicios Médicos' : 'Medical Services',
                'summary' => $locale === 'es' ? 'Consultas médicas especializadas en metabolismo, endocrinología y valoración clínica.' : 'Specialized medical consultations in metabolism, endocrinology, and clinical assessment.',
            ],
            'koru_at_home' => [
                'title' => $locale === 'es' ? 'Koru en Casa' : 'Koru At Home',
                'summary' => $locale === 'es' ? 'Masaje terapéutico y recuperación avanzada en la comodidad de tu hogar.' : 'Therapeutic massage and advanced recovery in the comfort of your home.',
            ],
        ];
    }

    #[Computed]
    public function getTestimonialsProperty(): array
    {
        return \App\Models\Testimonial::query()
            ->active()
            ->orderBy('id')
            ->get()
            ->map(fn (\App\Models\Testimonial $testimonial) => [
                'id' => $testimonial->id,
                'category' => $testimonial->category ?? 'clinical',
                'title' => $testimonial->title ?? $testimonial->author_name,
                'description' => $testimonial->description ?? $testimonial->quote_en,
                'video_path' => $testimonial->video_path ?? $testimonial->video_url,
            ])
            ->toArray();
    }

    #[On('locale-changed')]
    public function updateLocaleFromHeader(string $locale): void
    {
        $this->setLocale($locale);
    }

    public function render()
    {
        return view('livewire.pages.landing-page');
    }
}
