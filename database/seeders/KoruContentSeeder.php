<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Package;
use App\Models\PackageTerm;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KoruContentSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        SiteSetting::query()->delete();
        Service::query()->delete();
        Package::query()->delete();
        PackageTerm::query()->delete();
        Course::query()->delete();
        TeamMember::query()->delete();
        Testimonial::query()->delete();

        $this->seedSiteSettings();
        $this->seedServices();
        $this->seedPackages();
        $this->seedPackageTerms();
        $this->seedCourses();
        $this->seedTeamMembers();
        $this->seedTestimonials();
    }

    protected function seedSiteSettings(): void
    {
        $settings = [
            'hero_title' => 'Pain free, better life',
            'clinic_address' => '6405 NW 36th St, Suite 100, Virginia Gardens, FL 33166',
            'clinic_hours' => 'Thu-Tue: 8:00 AM - 8:00 PM (Wednesdays: Closed)',
            'clinic_phone' => '+17867528054',

            // Legacy aliases used by existing Livewire components.
            'hero_headline_en' => 'Pain free, better life',
            'hero_subtitle_en' => 'Clinical massage, recovery technology, medical services, and at-home concierge care in Virginia Gardens, Miami.',
            'phone' => '+1 786-752-8054',
            'hours' => 'Thu-Tue: 8:00 AM - 8:00 PM (Wednesdays: Closed)',
            'address' => '6405 NW 36th St, Suite 100, Virginia Gardens, FL 33166',
            'footer_disclaimer_en' => 'Insurance and self-pay options are available. Appointments by reservation only.',
            'contact_email' => 'info@korucenter.com',
            'social_instagram' => 'https://instagram.com/korucenter',
            'social_facebook' => 'https://www.facebook.com/profile.php?id=61587013239438',
            'footer_copyright_en' => '© '.date('Y').' KORU Center. All rights reserved.',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::query()->updateOrCreate(
                ['key' => $key],
                ['value' => $value],
            );
        }
    }

    protected function seedServices(): void
    {
        $services = [
            [
                'name_en' => 'MOM-TO-BE THERAPY MASSAGE',
                'description_en' => 'A specialized session designed to support women throughout pregnancy by combining therapeutic massage with gentle pelvic mobility exercises and active stretching. This treatment helps reduce lower back pain, improve circulation, relieve tension, and enhance flexibility, providing safe and effective care for both mother and baby. (After 10 weeks of pregnancy).',
                'price' => 120.00,
                'duration' => '60 min',
                'image_path' => 'img/services/Mom-to-Be.webp',
                'category' => 'manual_therapy',
                'active_status' => true,
            ],
            [
                'name_en' => 'RELAXING MASSAGE',
                'description_en' => 'A restorative session designed to relieve stress and promote overall well-being. Gentle, flowing techniques are combined with hot stones, aromatherapy, and craniosacral methods to encourage deep relaxation, improve circulation, and restore balance to both body and mind.',
                'price' => 120.00,
                'duration' => '60 min (Also available for 90 min)',
                'image_path' => 'img/services/RelaxingMassage.webp',
                'category' => 'manual_therapy',
                'active_status' => true,
            ],
            [
                'name_en' => 'DEEP TISSUE MASSAGE',
                'description_en' => 'Therapeutic treatment using slow, firm pressure to target deep layers of muscle and connective tissue. This session helps release chronic tension, reduce stiffness, and improve mobility. Cupping therapy and Stretching may be incorporated to enhance circulation and support muscle recovery.',
                'price' => 120.00,
                'duration' => '60 min',
                'image_path' => 'img/services/relaxing.webp',
                'category' => 'manual_therapy',
                'active_status' => true,
            ],
            [
                'name_en' => 'SPORT RECOVERY THERAPY',
                'description_en' => 'A performance-focused session designed to accelerate recovery, reduce muscle fatigue, and prevent injury. This treatment combines assisted stretching, myofascial release, percussion therapy, and targeted mobility techniques to restore optimal function.',
                'duration' => '60 min',
                'image_path' => 'img/services/Sport_Recovery.jpg',
                'category' => 'manual_therapy',
                'active_status' => true,
            ],
            [
                'name_en' => 'SUPER RECOVERY',
                'description_en' => 'The ultimate recovery experience combining a full-body therapeutic massage with advanced red light therapy and a refreshing cold plunge. This session is designed to reduce muscle fatigue, boost circulation, accelerate recovery, and leave you feeling recharged from head to toe.',
                'duration' => '90 min',
                'image_path' => 'img/services/luzroja.webp',
                'category' => 'manual_therapy',
                'active_status' => true,
            ],
            [
                'name_en' => 'COUPLE MASSAGE',
                'description_en' => 'A shared wellness experience designed for two. Enjoy side-by-side therapeutic massage in a calm and relaxing environment, perfect for relieving tension, reducing stress, and creating a moment of connection and renewal together.',
                'duration' => '60 min',
                'image_path' => 'img/services/deeptissuemassage.webp',
                'category' => 'manual_therapy',
                'active_status' => true,
            ],
            [
                'name_en' => 'ULTIMATE 4 HANDS EXPERIENCE',
                'description_en' => 'Two therapists working in perfect sync to deliver a deeply relaxing and balanced full-body massage. The synchronized movements provide an immersive experience that melts away stress, relieves muscle tension, and enhances overall well-being.',
                'image_path' => 'img/services/4_hands.webp',
                'category' => 'manual_therapy',
                'active_status' => true,
            ],
            [
                'name_en' => 'ASSESSMENT SESSION',
                'description_en' => 'A one-on-one session to evaluate your medical history, current condition, and specific goals. This consultation includes a thorough assessment and personalized recommendations, guiding you toward the most effective treatment or rehabilitation plan tailored to your needs.',
                'price' => 80.00,
                'duration' => '30 min',
                'image_path' => 'img/services/assessmentSession.webp',
                'category' => 'recovery_performance',
                'active_status' => true,
            ],
            [
                'name_en' => 'THERAPEUTIC EXERCISES',
                'description_en' => 'Guided exercises designed to improve mobility, strength, stability, and functional movement as part of your recovery plan.',
                'category' => 'recovery_performance',
                'active_status' => true,
            ],
            [
                'name_en' => 'THERAPEUTIC REHAB SESSION',
                'description_en' => 'A personalized rehabilitation session designed to restore mobility, reduce pain, and improve functional movement. Our team specializes in trauma and orthopedic injuries, providing expert care for both pre- and post-surgical patients as well as sports-related conditions. Using evidence-based techniques and corrective exercises, we support recovery, enhance strength, and promote long-term musculoskeletal health.',
                'price' => 120.00,
                'duration' => '60 min',
                'image_path' => 'img/services/Therapeutic Rehab.webp',
                'category' => 'recovery_performance',
                'active_status' => true,
            ],
            [
                'name_en' => 'NO HANDS RECOVERY SESSION',
                'description_en' => 'Recharge your body in just 30 minutes with the power of advanced recovery technology-no hands required. Enjoy the perfect combo of red light therapy, Normatec compression boots, and a cold plunge to reduce soreness, fight fatigue, and leave you feeling refreshed and energized.',
                'price' => 60.00,
                'duration' => '30 min',
                'image_path' => 'img/services/nohands.webp',
                'category' => 'manual_therapy',
                'active_status' => true,
            ],
            [
                'name_en' => 'METABOLIC & ENDOCRINE CONSULTATION',
                'description_en' => 'An exclusive medical consultation led by a specialist in endocrinology and metabolism. Through an in-depth evaluation, we identify hormonal and metabolic imbalances to create a tailored plan that enhances energy, supports healthy weight management, and optimizes overall well-being.',
                'price' => 250.00,
                'duration' => '30 min',
                'image_path' => 'img/services/relaxingMen.webp',
                'category' => 'medical_services',
                'active_status' => true,
            ],
            [
                'name_en' => 'MEDICAL ASSESSMENT SESSION',
                'description_en' => 'A one-on-one session to evaluate your medical history, current condition, and specific goals. This consultation includes a thorough assessment and personalized recommendations, guiding you toward the most effective medical treatment plan.',
                'price' => 80.00,
                'duration' => '30 min',
                'image_path' => 'img/services/relaxing.webp',
                'category' => 'medical_services',
                'active_status' => true,
            ],
            [
                'name_en' => 'KORU AT HOME',
                'description_en' => 'Enjoy Massage Therapy services and Advanced Recovery treatments in the comfort of your home. Our specialists deliver premium care designed to relieve tension, reduce fatigue, and restore balance. Prices may vary depending on location.',
                'price' => 120.00,
                'duration' => '60-90 min',
                'image_path' => 'img/services/KoruatHome.webp',
                'category' => 'koru_at_home',
                'active_status' => true,
            ],
            [
                'name_en' => 'B12 Power Shot',
                'description_en' => 'Energy & vitality boost. Ingredients: Vitamin B12',
                'price' => 35.00,
                'duration' => 'Quick shot',
                'category' => 'booster_shots',
                'active_status' => true,
            ],
            [
                'name_en' => 'NAD+ Recharge',
                'description_en' => 'Cellular energy & recovery. Ingredients: NAD+',
                'price' => 49.00,
                'duration' => 'Quick shot',
                'category' => 'booster_shots',
                'active_status' => true,
            ],
            [
                'name_en' => 'Metabo Shot (MIC)',
                'description_en' => 'Fat metabolism & energy support. Ingredients: Methionine, Inositol, Choline',
                'price' => 48.00,
                'duration' => 'Quick shot',
                'category' => 'booster_shots',
                'active_status' => true,
            ],
            [
                'name_en' => 'Glow Shot (Glutathione)',
                'description_en' => 'Antioxidant & skin health. Ingredients: Glutathione',
                'price' => 48.00,
                'duration' => 'Quick shot',
                'category' => 'booster_shots',
                'active_status' => true,
            ],
            [
                'name_en' => 'Carnitine Drive',
                'description_en' => 'Performance & fat utilization. Ingredients: L-Carnitine',
                'price' => 48.00,
                'duration' => 'Quick shot',
                'category' => 'booster_shots',
                'active_status' => true,
            ],
            [
                'name_en' => 'Immune Boost (Tri-Immune)',
                'description_en' => 'Extra immune defense. Ingredients: Vitamin C, Zinc, Glutathione',
                'price' => 48.00,
                'duration' => 'Quick shot',
                'category' => 'booster_shots',
                'active_status' => true,
            ],
            [
                'name_en' => 'KORU FLOW',
                'description_en' => 'Ingredients: Vitamin C, Arginine, Complex B, B12, Zinc, Glutathione.',
                'price' => 198.00,
                'duration' => '45-60 min',
                'category' => 'iv_therapy',
                'active_status' => true,
            ],
            [
                'name_en' => 'ENERGY BOOST PRO',
                'description_en' => 'Ingredients: Arginine, Complex B, B12, Zinc.',
                'price' => 178.00,
                'duration' => '45-60 min',
                'category' => 'iv_therapy',
                'active_status' => true,
            ],
            [
                'name_en' => 'HYDRA RESET',
                'description_en' => 'Ingredients: Vitamin C, Amino Blend (MIC), Complex B12.',
                'price' => 168.00,
                'duration' => '45-60 min',
                'category' => 'iv_therapy',
                'active_status' => true,
            ],
            [
                'name_en' => 'IMMUNE SHIELD',
                'description_en' => 'Ingredients: Vitamin C, Zinc, Complex B.',
                'price' => 178.00,
                'duration' => '45-60 min',
                'category' => 'iv_therapy',
                'active_status' => true,
            ],
        ];

        foreach ($services as $service) {
            // Ensure seeded services are eligible for day discounts by default
            $service = array_merge($service, ['discount_eligible' => true]);

            Service::query()->updateOrCreate(
                ['slug' => Str::slug($service['name_en'])],
                $service,
            );
        }
    }

    protected function seedPackages(): void
    {
        $packages = [
            [
                'slug' => 'basic',
                'name_en' => 'Basic',
                'description_en' => 'Single session for targeted recovery or maintenance.',
                'price' => 120.00,
                'sessions' => 1,
                'validity' => null,
                'sort_order' => 1,
                'active_status' => true,
            ],
            [
                'slug' => 'standard',
                'name_en' => 'Standard',
                'description_en' => 'Perfect for consistent weekly care. Ideal for ongoing recovery and performance optimization.',
                'price' => 500.00,
                'sessions' => 5,
                'validity' => 'Valid for 8 weeks',
                'sort_order' => 2,
                'active_status' => true,
            ],
            [
                'slug' => 'advanced',
                'name_en' => 'Advanced',
                'description_en' => 'Best value for intensive programs. Designed for athletes and clients with specific recovery goals.',
                'price' => 950.00,
                'sessions' => 10,
                'validity' => 'Valid for 12 weeks',
                'sort_order' => 3,
                'active_status' => true,
            ],
            [
                'slug' => 'elite',
                'name_en' => 'Elite',
                'description_en' => 'Premium package for maximum results. Includes priority scheduling and comprehensive recovery support.',
                'price' => 1800.00,
                'sessions' => 20,
                'validity' => 'Valid for 25 weeks',
                'sort_order' => 4,
                'active_status' => true,
            ],
        ];

        foreach ($packages as $package) {
            // Ensure seeded packages are eligible for day discounts by default
            $package = array_merge($package, ['discount_eligible' => true]);

            Package::query()->updateOrCreate(
                ['slug' => $package['slug']],
                $package,
            );
        }
    }

    protected function seedPackageTerms(): void
    {
        $terms = [
            [
                'content' => 'Packages are engineered for structured, continuous use to ensure optimal therapeutic outcomes. Sessions may be requested and scheduled based on calendar availability within the active validity period.',
                'sort_order' => 1,
                'active_status' => true,
            ],
            [
                'content' => 'Packages are non-cumulative across separate promotional periods and must be utilized fully within the specified timeframe.',
                'sort_order' => 2,
                'active_status' => true,
            ],
            [
                'content' => 'Any unused sessions will automatically expire at the conclusion of the stated package validity period.',
                'sort_order' => 3,
                'active_status' => true,
            ],
            [
                'content' => 'Packages are fully transferable to another individual with formal prior authorization written or sent by the original purchaser.',
                'sort_order' => 4,
                'active_status' => true,
            ],
            [
                'content' => 'All active packages are bound to a usage agreement. To safeguard the consistency of our professional therapies, packages and completed services are strictly non-refundable.',
                'sort_order' => 5,
                'active_status' => true,
            ],
        ];

        $packages = Package::query()->get();

        foreach ($terms as $term) {
            $packageTerm = PackageTerm::query()->updateOrCreate(
                ['sort_order' => $term['sort_order']],
                $term
            );

            foreach ($packages as $package) {
                $package->terms()->syncWithoutDetaching([$packageTerm->id => ['sort_order' => $packageTerm->sort_order]]);
            }
        }
    }

    protected function seedCourses(): void
    {
        $courses = [
            [
                'title_en' => 'Advanced Manual Therapy Techniques',
                'description_en' => 'High-visibility continuing education experience for Florida PTs, PTAs, and LMTs. Includes live assessment labs, manual release progressions, post-surgical precautions, and documentation frameworks aligned with license renewal requirements. Continuing Education Credits (CE) included.',
                'ce_credits' => 8,
                'date' => now()->addDays(45)->toDateString(),
                'price' => 695.00,
                'active_status' => true,
            ],
            [
                'title_en' => 'Sports Recovery Tech Certification',
                'description_en' => 'Multi-language certification for PTs, PTAs, and LMTs covering contrast therapy, compression systems, red-light recovery, hydration protocols, and biohacking technologies used in elite sports recovery lounges.',
                'ce_credits' => 10,
                'date' => now()->addDays(75)->toDateString(),
                'price' => 895.00,
                'active_status' => true,
            ],
        ];

        foreach ($courses as $course) {
            Course::query()->updateOrCreate(
                ['title_en' => $course['title_en']],
                $course,
            );
        }
    }

    protected function seedTeamMembers(): void
    {
        $members = [
            [
                'name' => 'Lenys',
                'instagram_handle' => '@lenysftto',
                'bio_en' => 'Sports physiotherapist specializing in athletic recovery and therapeutic massage.',
                'specialty_en' => 'Sports physiotherapist specializing in athletic recovery and therapeutic massage.',
                'image_path' => 'img/team/team1.webp',
                'active_status' => true,
            ],
            [
                'name' => 'Raúl',
                'instagram_handle' => '@rauldiazfisio',
                'bio_en' => 'Performance specialist focused on biomechanical assessment and functional rehabilitation.',
                'specialty_en' => 'Performance specialist focused on biomechanical assessment and functional rehabilitation.',
                'image_path' => 'img/team/team2.webp',
                'active_status' => true,
            ],
            [
                'name' => 'Pierre',
                'instagram_handle' => '@fisiopierre',
                'bio_en' => 'Sports therapist creating recovery plans for athletes.',
                'specialty_en' => 'Sports therapist creating recovery plans for athletes.',
                'image_path' => 'img/team/team3.webp',
                'active_status' => true,
            ],
            [
                'name' => 'Angie',
                'instagram_handle' => '@angietherapy',
                'bio_en' => 'Mobility coach specializing in advanced mobility and injury prevention.',
                'specialty_en' => 'Mobility coach specializing in advanced mobility and injury prevention.',
                'image_path' => 'img/team/team4.webp',
                'active_status' => true,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::query()->updateOrCreate(
                ['name' => $member['name']],
                $member,
            );
        }
    }

    protected function seedTestimonials(): void
    {
        $testimonials = [
            [
                'id' => 1,
                'author_name' => 'KORU Recovery Lounge',
                'author_role' => 'Recovery Experience',
                'quote_en' => 'Tour the recovery lounge',
                'category' => 'lounge',
                'title' => $this->t('Tour the recovery lounge', 'Recorrido por el lounge de recuperación'),
                'description' => $this->t('View how our IV and recovery lounge creates a premium clinical environment.', 'Descubre cómo nuestro lounge de IV y recuperación crea un entorno clínico premium.'),
                'video_path' => 'videos/testimonials/1.mp4',
                'active_status' => true,
            ],
            [
                'id' => 2,
                'author_name' => 'KORU Athlete Program',
                'author_role' => 'Performance Recovery',
                'quote_en' => 'Athlete recovery in action',
                'category' => 'athlete',
                'title' => $this->t('Athlete recovery in action', 'Recuperación de atletas en acción'),
                'description' => $this->t('See how our protocols support athletes returning to training faster.', 'Observa cómo nuestros protocolos apoyan a los atletas a regresar al entrenamiento más rápido.'),
                'video_path' => 'videos/testimonials/2.mp4',
                'active_status' => true,
            ],
            [
                'id' => 3,
                'author_name' => 'KORU Clinical Team',
                'author_role' => 'Clinical Outcomes',
                'quote_en' => 'Clinical performance stories',
                'category' => 'clinical',
                'title' => $this->t('Clinical performance stories', 'Historias de rendimiento clínico'),
                'description' => $this->t('Discover the clinical outcomes behind our premium care services.', 'Descubre los resultados clínicos detrás de nuestros servicios de atención premium.'),
                'video_path' => 'videos/testimonials/3.mp4',
                'active_status' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::query()->updateOrCreate(
                ['id' => $testimonial['id']],
                $testimonial,
            );
        }
    }

    protected function t(string $en, string $es): string
    {
        return app()->getLocale() === 'es' ? $es : $en;
    }
}
