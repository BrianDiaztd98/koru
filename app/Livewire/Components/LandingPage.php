<?php

namespace App\Livewire\Components;

use App\Models\About;
use App\Models\Course;
use App\Models\LandingPageVisit;
use App\Models\Package;
use App\Models\PackageTerm;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Services\DiscountService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class LandingPage extends Component
{
    public array $headerNavItems = [];

    protected DiscountService $discountService;

    public function mount(DiscountService $discountService): void
    {
        $this->discountService = $discountService;
        $this->headerNavItems = $this->buildHeaderNavItems();

        // Count each landing-page visit once per browser session so refreshes and F5 do not inflate the stats.
        if (! session()->has('landing_page_viewed')) {
            LandingPageVisit::create();
            session()->put('landing_page_viewed', true);
        }
    }

    protected function buildHeaderNavItems(): array
    {
        return [
            ['label' => 'About', 'href' => '#about-us'],
            ['label' => 'Services', 'href' => '#services'],
            ['label' => 'Education', 'href' => '#education'],
            ['label' => 'Team', 'href' => '#team'],
            ['label' => 'Location', 'href' => '#location'],
        ];
    }

    #[Computed]
    public function getDailyDiscountMetadataProperty(): array
    {
        $percentage = $this->discountService->percentageForDay();

        return [
            'percentage' => $percentage,
            'has_discount' => $percentage > 0,
        ];
    }

    #[Computed]
    public function getHeroSlidesProperty(): array
    {
        return [
            [
                'id' => 0,
                'badge' => 'Wellness & Performance',
                'title_line_1' => 'Relaxing Massage',
                'title_line_2' => 'Total Recovery',
                'description' => 'Advanced therapeutic techniques designed to relieve muscle tension, reduce stress levels, and significantly improve joint mobility.',
                'btn_primary_text' => 'Book a Session',
                'btn_primary_url' => 'https://wa.me/17867528054',
                'btn_secondary_text' => 'View Services',
                'btn_secondary_url' => '#services',
                'image' => asset('img/carrucel/relaxing.jpg'),
            ],
            [
                'id' => 1,
                'badge' => 'Advanced Recovery',
                'title_line_1' => 'Normatec',
                'title_line_2' => 'Technology',
                'description' => 'Dynamic sequential compression bio-mechanisms to optimize blood flow, accelerate muscle clearance, and reduce inflammation effortlessly.',
                'btn_primary_text' => 'Book No Hands Session',
                'btn_primary_url' => 'https://wa.me/17867528054',
                'btn_secondary_text' => 'View Services',
                'btn_secondary_url' => '#services',
                'image' => asset('img/carrucel/normatec.png'),
            ],
            [
                'id' => 2,
                'badge' => 'Total Regeneration',
                'title_line_1' => 'Super',
                'title_line_2' => 'Recovery Protocol',
                'description' => 'Synergistic red light therapy and cold plunge contrast routines engineered for deep cellular regeneration and elite performance.',
                'btn_primary_text' => 'Book Super Recovery',
                'btn_primary_url' => 'https://wa.me/17867528054',
                'btn_secondary_text' => 'View Services',
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
            ->map(fn ($group) => $group->map(fn (Service $service) => $this->buildPricedItem($service->price, $service->discount_eligible, [
                'id' => $service->id,
                'slug' => $service->slug,
                'title' => $service->name_en,
                'description' => $service->description_en,
                'duration' => $service->duration,
                'image' => $service->image_path ?: asset('img/carrucel/relaxing.jpg'),
            ]))->toArray())
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
            ->map(fn (Service $service) => $this->buildPricedItem($service->price, $service->discount_eligible, [
                'id' => $service->id,
                'title' => $service->name_en,
                'description' => $service->description_en,
            ]))->toArray();
    }

    #[Computed]
    public function getPackagesProperty(): array
    {
        return Package::query()
            ->where('active_status', true)
            ->orderBy('sort_order')
            ->get()
            ->map(fn (Package $package) => $this->buildPricedItem($package->price, $package->discount_eligible, [
                'id' => $package->id,
                'name' => $package->name_en,
                'sessions' => $package->sessions,
                'validity' => $package->validity,
                'description' => $package->description_en,
            ]))->toArray();
    }

    #[Computed]
    public function getPackageTermsProperty(): array
    {
        return PackageTerm::query()
            ->where('active_status', true)
            ->whereHas('packages', fn ($query) => $query->where('active_status', true))
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
            ->map(fn (Service $service) => $this->buildPricedItem($service->price, $service->discount_eligible, [
                'id' => $service->id,
                'title' => $service->name_en,
                'description' => $service->description_en,
                'duration' => $service->duration,
                'icon' => $this->resolveIvIcon($service),
            ]))->toArray();
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
                'title' => $course->title_en,
                'description' => $course->description_en,
                'ce_credits' => $course->ce_credits,
                'date' => $course->date->format('M j, Y'),
                'price' => number_format($course->price, 2),
            ])
            ->toArray();
    }

    protected function formatPrice(float|string|null $price): string
    {
        return number_format((float) ($price ?? 0), 2);
    }

    protected function buildPricedItem(float|string|null $price, bool $discountEligible, array $data = []): array
    {
        $percentage = $discountEligible ? $this->discountService->percentageForDay() : 0;
        $downPayment = $discountEligible ? $this->discountService->discountAmount($price) : 0;
        $hasDownPayment = $discountEligible && $percentage > 0;

        return array_merge($data, [
            'price' => $this->formatPrice($price),
            'down_payment' => $this->formatPrice($downPayment),
            'remaining_balance' => $this->formatPrice(max(0, (float) $price - $downPayment)),
            'down_payment_percentage' => $percentage,
            'has_down_payment' => $hasDownPayment,
            'discount_eligible' => $discountEligible,
            // backward compatibility for any remaining templates using old keys
            'discounted_price' => $this->formatPrice($downPayment),
            'discount_percentage' => $percentage,
            'has_discount' => $hasDownPayment,
        ]);
    }

    #[Computed]
    public function getTeamMembersProperty(): array
    {
        return TeamMember::query()
            ->where('active_status', true)
            ->orderBy('name')
            ->get()
            ->map(fn (TeamMember $member) => [
                'id' => $member->id,
                'name' => $member->name,
                'instagram' => $member->instagram_handle,
                'bio' => $member->bio_en,
                'specialty' => $member->specialty_en ?? $member->bio_en,
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
        $settings = $this->siteSettings;

        return [
            'hero_headline' => $settings['hero_headline_en'] ?? 'Pain free, better life',
            'hero_subtitle' => $settings['hero_subtitle_en'] ?? 'Center of excellence in recovery and sports performance.',
            'phone' => $settings['phone'] ?? '+1 786-752-8054',
            'hours' => $settings['hours'] ?? 'Thu-Tue, 8am-8pm',
            'address' => $settings['address'] ?? '6405 NW 36th St, #100, Virginia Gardens FL 33166',
            'footer_disclaimer' => $settings['footer_disclaimer_en'] ?? 'Insurance & self-pay options available.',
            'contact_email' => $settings['contact_email'] ?? 'info@korucenter.com',
            'social_instagram' => $settings['social_instagram'] ?? '',
            'social_facebook' => $settings['social_facebook'] ?? '',
            'footer_copyright' => $settings['footer_copyright_en'] ?? '© '.date('Y').' Koru Center. All rights reserved.',
        ];
    }

    #[Computed]
    public function getPillarLabelsProperty(): array
    {
        return [
            'manual_therapy' => [
                'title' => 'Massage Services',
                'summary' => 'Clinical massage, prenatal care, deep relaxation, and manual recovery.',
            ],
            'recovery_performance' => [
                'title' => 'Therapy Services',
                'summary' => 'Assessment, therapeutic rehab, and advanced recovery technology.',
            ],
            'medical_services' => [
                'title' => 'Medical Services',
                'summary' => 'Specialized medical consultations in metabolism, endocrinology, and clinical assessment.',
            ],
            'koru_at_home' => [
                'title' => 'Koru At Home',
                'summary' => 'Therapeutic massage and advanced recovery in the comfort of your home.',
            ],
        ];
    }

    #[Computed]
    public function getTestimonialsProperty(): array
    {
        return Testimonial::query()
            ->active()
            ->orderBy('id')
            ->get()
            ->map(fn (Testimonial $testimonial) => [
                'id' => $testimonial->id,
                'category' => $testimonial->category ?? 'clinical',
                'title' => $testimonial->title ?? $testimonial->author_name,
                'description' => $testimonial->description ?? $testimonial->quote_en,
                'video_path' => $testimonial->video_path ?? $testimonial->video_url,
            ])
            ->toArray();
    }

    public function render()
    {
        return view('livewire.pages.landing-page');
    }
}
