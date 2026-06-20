<?php

namespace Database\Seeders;

use App\Models\Course;
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
        Course::query()->delete();
        TeamMember::query()->delete();
        Testimonial::query()->delete();

        $this->seedSiteSettings();
        $this->seedServices();
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
            'hero_headline_es' => 'Una vida sin dolor, diseñada para recuperarte mejor.',
            'hero_subtitle_en' => 'Clinical massage, recovery technology, medical services, and at-home concierge care in Virginia Gardens, Miami.',
            'hero_subtitle_es' => 'Masaje clínico, tecnología de recuperación, servicios médicos y atención concierge a domicilio en Virginia Gardens, Miami.',
            'phone' => '+1 786-752-8054',
            'hours' => 'Thu-Tue: 8:00 AM - 8:00 PM (Wednesdays: Closed)',
            'address' => '6405 NW 36th St, Suite 100, Virginia Gardens, FL 33166',
            'footer_disclaimer_en' => 'Insurance and self-pay options are available. Appointments by reservation only.',
            'footer_disclaimer_es' => 'Opciones de seguro y pago privado disponibles. Citas solo con reserva.',
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
                'name_es' => 'MOM-TO-BE THERAPY MASSAGE',
                'description_en' => 'A specialized session designed to support women throughout pregnancy by combining therapeutic massage with gentle pelvic mobility exercises and active stretching. This treatment helps reduce lower back pain, improve circulation, relieve tension, and enhance flexibility, providing safe and effective care for both mother and baby. (After 10 weeks of pregnancy).',
                'description_es' => 'Una sesión especializada diseñada para acompañar a la mujer durante el embarazo, combinando masaje terapéutico con ejercicios suaves de movilidad pélvica y estiramientos activos. Este tratamiento ayuda a reducir el dolor lumbar, mejorar la circulación, aliviar la tensión y aumentar la flexibilidad, brindando cuidado seguro y efectivo para mamá y bebé. (Después de 10 semanas de embarazo).',
                'price' => 120.00,
                'duration' => '60 min',
                'image_path' => 'img/services/Mom-to-Be.jpg',
                'category' => 'manual_therapy',
                'active_status' => true,
            ],
            [
                'name_en' => 'RELAXING MASSAGE',
                'name_es' => 'RELAXING MASSAGE',
                'description_en' => 'A restorative session designed to relieve stress and promote overall well-being. Gentle, flowing techniques are combined with hot stones, aromatherapy, and craniosacral methods to encourage deep relaxation, improve circulation, and restore balance to both body and mind.',
                'description_es' => 'Una sesión restaurativa diseñada para aliviar el estrés y promover el bienestar general. Técnicas suaves y fluidas se combinan con piedras calientes, aromaterapia y métodos craneosacros para favorecer una relajación profunda, mejorar la circulación y restaurar el equilibrio del cuerpo y la mente.',
                'price' => 120.00,
                'duration' => '60 min (Also available for 90 min)',
                'image_path' => 'img/services/RelaxingMassage.jpg',
                'category' => 'manual_therapy',
                'active_status' => true,
            ],
            [
                'name_en' => 'DEEP TISSUE MASSAGE',
                'name_es' => 'DEEP TISSUE MASSAGE',
                'description_en' => 'Therapeutic treatment using slow, firm pressure to target deep layers of muscle and connective tissue. This session helps release chronic tension, reduce stiffness, and improve mobility. Cupping therapy and Stretching may be incorporated to enhance circulation and support muscle recovery.',
                'description_es' => 'Tratamiento terapéutico que utiliza presión lenta y firme para trabajar capas profundas de músculo y tejido conectivo. Esta sesión ayuda a liberar tensión crónica, reducir rigidez y mejorar la movilidad. Se puede incorporar ventosaterapia y estiramientos para favorecer la circulación y apoyar la recuperación muscular.',
                'price' => 120.00,
                'duration' => '60 min',
                'image_path' => 'img/services/deeptissuemassage.webp',
                'category' => 'manual_therapy',
                'active_status' => true,
            ],
            [
                'name_en' => 'ASSESSMENT SESSION',
                'name_es' => 'ASSESSMENT SESSION',
                'description_en' => 'A one-on-one session to evaluate your medical history, current condition, and specific goals. This consultation includes a thorough assessment and personalized recommendations, guiding you toward the most effective treatment or rehabilitation plan tailored to your needs.',
                'description_es' => 'Una sesión individual para evaluar tu historial médico, condición actual y objetivos específicos. Esta consulta incluye una valoración completa y recomendaciones personalizadas, guiándote hacia el plan de tratamiento o rehabilitación más efectivo según tus necesidades.',
                'price' => 80.00,
                'duration' => '30 min',
                'image_path' => 'img/carrucel/relaxing.jpg',
                'category' => 'recovery_performance',
                'active_status' => true,
            ],
            [
                'name_en' => 'THERAPEUTIC REHAB SESSION',
                'name_es' => 'THERAPEUTIC REHAB SESSION',
                'description_en' => 'A personalized rehabilitation session designed to restore mobility, reduce pain, and improve functional movement. Our team specializes in trauma and orthopedic injuries, providing expert care for both pre- and post-surgical patients as well as sports-related conditions. Using evidence-based techniques and corrective exercises, we support recovery, enhance strength, and promote long-term musculoskeletal health.',
                'description_es' => 'Una sesión de rehabilitación personalizada diseñada para restaurar la movilidad, reducir el dolor y mejorar el movimiento funcional. Nuestro equipo se especializa en lesiones traumáticas y ortopédicas, brindando atención experta a pacientes pre y postquirúrgicos, así como a condiciones relacionadas con el deporte. Mediante técnicas basadas en evidencia y ejercicios correctivos, apoyamos la recuperación, fortalecemos y promovemos la salud musculoesquelética a largo plazo.',
                'price' => 120.00,
                'duration' => '60 min',
                'image_path' => 'img/services/Therapeutic Rehab.webp',
                'category' => 'recovery_performance',
                'active_status' => true,
            ],
            [
                'name_en' => 'NO HANDS RECOVERY SESSION',
                'name_es' => 'NO HANDS RECOVERY SESSION',
                'description_en' => 'Recharge your body in just 30 minutes with the power of advanced recovery technology-no hands required. Enjoy the perfect combo of red light therapy, Normatec compression boots, and a cold plunge to reduce soreness, fight fatigue, and leave you feeling refreshed and energized.',
                'description_es' => 'Recarga tu cuerpo en solo 30 minutos con el poder de la tecnología avanzada de recuperación: sin manos requeridas. Disfruta la combinación perfecta de terapia de luz roja, botas de compresión Normatec y cold plunge para reducir el dolor muscular, combatir la fatiga y salirte sintiendo renovado y con energía.',
                'price' => 60.00,
                'duration' => '30 min',
                'image_path' => 'img/services/nohands.jpg',
                'category' => 'recovery_performance',
                'active_status' => true,
            ],
            [
                'name_en' => 'METABOLIC & ENDOCRINE CONSULTATION',
                'name_es' => 'METABOLIC & ENDOCRINE CONSULTATION',
                'description_en' => 'An exclusive medical consultation led by a specialist in endocrinology and metabolism. Through an in-depth evaluation, we identify hormonal and metabolic imbalances to create a tailored plan that enhances energy, supports healthy weight management, and optimizes overall well-being.',
                'description_es' => 'Una consulta médica exclusiva dirigida por un especialista en endocrinología y metabolismo. Mediante una evaluación profunda, identificamos desequilibrios hormonales y metabólicos para crear un plan personalizado que mejora la energía, apoya el manejo saludable del peso y optimiza el bienestar general.',
                'price' => 250.00,
                'duration' => '30 min',
                'image_path' => 'img/carrucel/relaxing3.jpg',
                'category' => 'medical_services',
                'active_status' => true,
            ],
            [
                'name_en' => 'MEDICAL ASSESSMENT SESSION',
                'name_es' => 'MEDICAL ASSESSMENT SESSION',
                'description_en' => 'A one-on-one session to evaluate your medical history, current condition, and specific goals. This consultation includes a thorough assessment and personalized recommendations, guiding you toward the most effective medical treatment plan.',
                'description_es' => 'Una sesión individual para evaluar tu historial médico, condición actual y objetivos específicos. Esta consulta incluye una valoración completa y recomendaciones personalizadas, guiándote hacia el plan de tratamiento médico más efectivo.',
                'price' => 80.00,
                'duration' => '30 min',
                'image_path' => 'img/carrucel/relaxing.jpg',
                'category' => 'medical_services',
                'active_status' => true,
            ],
            [
                'name_en' => 'KORU AT HOME',
                'name_es' => 'KORU AT HOME',
                'description_en' => 'Enjoy Massage Therapy services and Advanced Recovery treatments in the comfort of your home. Our specialists deliver premium care designed to relieve tension, reduce fatigue, and restore balance. Prices may vary depending on location.',
                'description_es' => 'Disfruta servicios de Masaje Terapéutico y tratamientos avanzados de recuperación en la comodidad de tu hogar. Nuestros especialistas brindan atención premium diseñada para aliviar la tensión, reducir la fatiga y restaurar el equilibrio. Los precios pueden variar según la ubicación.',
                'price' => 120.00,
                'duration' => '60 min',
                'image_path' => 'img/services/Koru at Home.jpg',
                'category' => 'koru_at_home',
                'active_status' => true,
            ],
            [
                'name_en' => 'B12 Power Shot',
                'name_es' => 'B12 Power Shot',
                'description_en' => 'Energy & vitality boost. Ingredients: Vitamin B12',
                'description_es' => 'Energía y vitalidad instantánea. Ingredientes: Vitamina B12',
                'price' => 35.00,
                'duration' => 'Quick shot',
                'category' => 'booster_shots',
                'active_status' => true,
            ],
            [
                'name_en' => 'NAD+ Recharge',
                'name_es' => 'NAD+ Recharge',
                'description_en' => 'Cellular energy & recovery. Ingredients: NAD+',
                'description_es' => 'Energía y recuperación celular. Ingredientes: NAD+',
                'price' => 49.00,
                'duration' => 'Quick shot',
                'category' => 'booster_shots',
                'active_status' => true,
            ],
            [
                'name_en' => 'Metabo Shot (MIC)',
                'name_es' => 'Metabo Shot (MIC)',
                'description_en' => 'Fat metabolism & energy support. Ingredients: Methionine, Inositol, Choline',
                'description_es' => 'Metabolismo graso y energía. Ingredientes: Metionina, Inositol, Colina',
                'price' => 48.00,
                'duration' => 'Quick shot',
                'category' => 'booster_shots',
                'active_status' => true,
            ],
            [
                'name_en' => 'Glow Shot (Glutathione)',
                'name_es' => 'Glow Shot (Glutathione)',
                'description_en' => 'Antioxidant & skin health. Ingredients: Glutathione',
                'description_es' => 'Antioxidante y salud de la piel. Ingredientes: Glutationa',
                'price' => 48.00,
                'duration' => 'Quick shot',
                'category' => 'booster_shots',
                'active_status' => true,
            ],
            [
                'name_en' => 'Carnitine Drive',
                'name_es' => 'Carnitine Drive',
                'description_en' => 'Performance & fat utilization. Ingredients: L-Carnitine',
                'description_es' => 'Rendimiento y utilización de grasa. Ingredientes: L-Carnitina',
                'price' => 48.00,
                'duration' => 'Quick shot',
                'category' => 'booster_shots',
                'active_status' => true,
            ],
            [
                'name_en' => 'Immune Boost (Tri-Immune)',
                'name_es' => 'Immune Boost (Tri-Immune)',
                'description_en' => 'Extra immune defense. Ingredients: Vitamin C, Zinc, Glutathione',
                'description_es' => 'Defensa inmune extra. Ingredientes: Vitamina C, Zinc, Glutationa',
                'price' => 48.00,
                'duration' => 'Quick shot',
                'category' => 'booster_shots',
                'active_status' => true,
            ],
            [
                'name_en' => 'KORU FLOW',
                'name_es' => 'KORU FLOW',
                'description_en' => 'Recover faster. Perform stronger. Ingredients: Vitamin C (Ascorbic Acid), Arginine HCL, Citrulline, Lysine HCL, Proline, Magnesium Chloride, Zinc Sulfate, B-Complex (B1, B2, B3, B5, B6). Benefits: Accelerates muscle recovery, reduces inflammation & soreness, enhances endurance & performance, replenishes essential nutrients. Perfect after intense training, competitions, or long weeks.',
                'description_es' => 'Recuperación más rápida. Rendimiento más fuerte. Ingredientes: Vitamina C (Ácido Ascórbico), Arginina HCL, Citrulina, Lisina HCL, Prolina, Cloruro de Magnesio, Sulfato de Zinc, B-Complejo (B1, B2, B3, B5, B6). Beneficios: Acelera la recuperación muscular, reduce la inflamación y dolor, mejora la resistencia y rendimiento, repone nutrientes esenciales. Ideal después de entrenamientos intensos, competencias o semanas largas.',
                'price' => 198.00,
                'duration' => '45-60 min',
                'category' => 'iv_therapy',
                'active_status' => true,
            ],
            [
                'name_en' => 'ENERGY BOOST PRO',
                'name_es' => 'ENERGY BOOST PRO',
                'description_en' => 'Clean energy. Sharp mind. Peak performance. Ingredients: Arginine HCL, Citrulline, Lysine HCL, Proline, Vitamin B1(Thiamine), Vitamin B2 (Riboflavin), Vitamin B3 (Niacinamide), Vitamin B5 (Dexpanthenol), Vitamin B6 (Pyridoxine). Benefits: Increases natural energy levels, supports metabolism, enhances focus & mental clarity, improves physical performance. Ideal post-workout, long days, or heat exposure.',
                'description_es' => 'Energía limpia. Mente clara. Rendimiento máximo. Ingredientes: Arginina HCL, Citrulina, Lisina HCL, Prolina, Vitamina B1 (Tiamina), Vitamina B2 (Riboflavina), Vitamina B3 (Niacinamida), Vitamina B5 (Dexpantenol), Vitamina B6 (Piridoxina). Beneficios: Aumenta los niveles de energía naturales, apoya el metabolismo, mejora el enfoque y claridad mental, mejora el rendimiento físico. Ideal post-entrenamiento, días largos o exposición al calor.',
                'price' => 178.00,
                'duration' => '45-60 min',
                'category' => 'iv_therapy',
                'active_status' => true,
            ],
            [
                'name_en' => 'HYDRA RESET',
                'name_es' => 'HYDRA RESET',
                'description_en' => 'Rehydrate. Recharge. Reset. Ingredients: Vitamin C (Ascorbic Acid), Olympia Mineral Blend, Olympia Vita-Complex. Benefits: Rapid hydration, electrolyte replenishment, boosts energy levels, supports recovery from dehydration.',
                'description_es' => 'Rehidrata. Recarga. Reinicia. Ingredientes: Vitamina C (Ácido Ascórbico), Mezcla Mineral Olympia, Complejo Vitálico Olympia. Beneficios: Hidratación rápida, reposición de electrolitos, aumenta los niveles de energía, apoya la recuperación de la deshidratación.',
                'price' => 168.00,
                'duration' => '45-60 min',
                'category' => 'iv_therapy',
                'active_status' => true,
            ],
            [
                'name_en' => 'IMMUNE SHIELD',
                'name_es' => 'IMMUNE SHIELD',
                'description_en' => 'Stronger defenses. Faster recovery. Ingredients: High-Dose Vitamin C, Zinc Sulfate, B-Complex (B1, B2, B3, B5, B6). Benefits: Strengthens immune system, reduces inflammation, supports faster recovery, helps prevent burnout. Essential during travel, seasonal changes, or heavy training.',
                'description_es' => 'Defensas más fuertes. Recuperación más rápida. Ingredientes: Vitamina C de alta dosis, Sulfato de Zinc, B-Complejo (B1, B2, B3, B5, B6). Beneficios: Fortalece el sistema inmunológico, reduce la inflamación, apoya una recuperación más rápida, ayuda a prevenir el agotamiento. Esencial durante viajes, cambios de estación o entrenamientos intensos.',
                'price' => 178.00,
                'duration' => '45-60 min',
                'category' => 'iv_therapy',
                'active_status' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::query()->updateOrCreate(
                ['slug' => Str::slug($service['name_en'])],
                $service,
            );
        }
    }

    protected function seedCourses(): void
    {
        $courses = [
            [
                'title_en' => 'Advanced Manual Therapy Techniques',
                'title_es' => 'Técnicas Avanzadas de Terapia Manual',
                'description_en' => 'High-visibility continuing education experience for Florida PTs, PTAs, and LMTs. Includes live assessment labs, manual release progressions, post-surgical precautions, and documentation frameworks aligned with license renewal requirements. Continuing Education Credits (CE) included.',
                'description_es' => 'Experiencia de educación continua de alta visibilidad para PT, PTA y LMT de Florida. Incluye laboratorios de evaluación en vivo, progresiones de liberación manual, precauciones postquirúrgicas y marcos de documentación alineados con requisitos de renovación de licencia. Créditos de Educación Continua (CE) incluidos.',
                'ce_credits' => 8,
                'date' => now()->addDays(45)->toDateString(),
                'price' => 695.00,
                'active_status' => true,
            ],
            [
                'title_en' => 'Sports Recovery Tech Certification',
                'title_es' => 'Certificación en Tecnologías de Recuperación Deportiva',
                'description_en' => 'Multi-language certification for PTs, PTAs, and LMTs covering contrast therapy, compression systems, red-light recovery, hydration protocols, and biohacking technologies used in elite sports recovery lounges.',
                'description_es' => 'Certificación bilingüe para PT, PTA y LMT sobre terapia de contraste, sistemas de compresión, recuperación con luz roja, protocolos de hidratación y tecnologías de biohacking utilizadas en lounges de recuperación deportiva de alto rendimiento.',
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
                'bio_es' => 'Fisioterapeuta especializada en recuperación deportiva y masaje terapéutico.',
                'specialty_en' => 'Sports physiotherapist specializing in athletic recovery and therapeutic massage.',
                'specialty_es' => 'Fisioterapeuta especializada en recuperación deportiva y masaje terapéutico.',
                'image_path' => 'img/team/team1.jpg',
                'active_status' => true,
            ],
            [
                'name' => 'Raúl',
                'instagram_handle' => '@rauldiazfisio',
                'bio_en' => 'Performance specialist focused on biomechanical assessment and functional rehabilitation.',
                'bio_es' => 'Especialista en rendimiento enfocado en evaluación biomecánica y rehabilitación funcional.',
                'specialty_en' => 'Performance specialist focused on biomechanical assessment and functional rehabilitation.',
                'specialty_es' => 'Especialista en rendimiento enfocado en evaluación biomecánica y rehabilitación funcional.',
                'image_path' => 'img/team/team2.jpg',
                'active_status' => true,
            ],
            [
                'name' => 'Pierre',
                'instagram_handle' => '@fisiopierre',
                'bio_en' => 'Sports therapist creating recovery plans for athletes.',
                'bio_es' => 'Terapeuta deportivo que crea planes de recuperación para atletas.',
                'specialty_en' => 'Sports therapist creating recovery plans for athletes.',
                'specialty_es' => 'Terapeuta deportivo que crea planes de recuperación para atletas.',
                'image_path' => 'img/team/team3.jpg',
                'active_status' => true,
            ],
            [
                'name' => 'Angie',
                'instagram_handle' => '@angietherapy',
                'bio_en' => 'Mobility coach specializing in advanced mobility and injury prevention.',
                'bio_es' => 'Coach de movilidad especializada en movilidad avanzada y prevención de lesiones.',
                'specialty_en' => 'Mobility coach specializing in advanced mobility and injury prevention.',
                'specialty_es' => 'Coach de movilidad especializada en movilidad avanzada y prevención de lesiones.',
                'image_path' => 'img/team/team4.jpg',
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
                'author_name' => 'Isabella R.',
                'author_role' => 'Endurance Athlete - Coral Gables',
                'quote_en' => '★★★★★ Koru gave me a concierge recovery plan after marathon training. The contrast protocols, compression, and IV support helped me feel human again within 48 hours.',
                'quote_es' => '★★★★★ Koru me dio un plan de recuperación concierge después de entrenar para un maratón. Los protocolos de contraste, compresión y soporte IV me hicieron sentir recuperada en menos de 48 horas.',
                'video_url' => null,
                'image_path' => 'img/team/team1.png',
                'active_status' => true,
            ],
            [
                'author_name' => 'Camila Torres',
                'author_role' => 'Physical Therapist - Miami',
                'quote_en' => '★★★★★ The recovery technology education at Koru is exactly what clinicians need: practical, premium, and immediately applicable with athletes.',
                'quote_es' => '★★★★★ La formación en tecnologías de recuperación de Koru es justo lo que necesitan los clínicos: práctica, premium y aplicable de inmediato con atletas.',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=0&rel=0',
                'image_path' => 'img/team/team2.png',
                'active_status' => true,
            ],
            [
                'author_name' => 'Daniel M.',
                'author_role' => 'Soccer Parent - Virginia Gardens',
                'quote_en' => '★★★★★ My son’s post-surgical rehab felt personalized from day one. The team combined clinical precision with the kind of care you expect from a premium Miami clinic.',
                'quote_es' => '★★★★★ La rehabilitación postquirúrgica de mi hijo se sintió personalizada desde el primer día. El equipo combinó precisión clínica con el nivel de atención que esperas de una clínica premium en Miami.',
                'video_url' => null,
                'image_path' => 'img/team/team3.png',
                'active_status' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::query()->updateOrCreate(
                [
                    'author_name' => $testimonial['author_name'],
                    'author_role' => $testimonial['author_role'],
                ],
                $testimonial,
            );
        }
    }
}
