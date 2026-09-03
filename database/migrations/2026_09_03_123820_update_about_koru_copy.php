<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $about = DB::table('abouts')->orderBy('id')->first();

        if (! $about) {
            return;
        }

        DB::table('abouts')->where('id', $about->id)->update([
            'description' => 'Therapy, recovery, and professional education in Miami, under one roof.',
            'philosophy' => "Koru is the Māori symbol of the unfurling fern frond — new life, growth, and forward movement. It's the name we chose because it's what we want for every person who walks in.",
            'vision' => 'KORU is a therapy, recovery, and professional education center in Miami. We combine clinical massage therapy, advanced recovery technologies, IV therapy, and continuing education for practitioners — under one roof, with real clinical standards behind each service.',
            'mission' => 'Care here is led by licensed professionals with backgrounds in physiotherapy and orthopedic manual therapy. Structured protocols, clear communication, and honest expectations about what each treatment can do.',
            'updated_at' => now(),
        ]);

        DB::table('about_glance_items')->where('about_id', $about->id)->delete();
        DB::table('about_glance_items')->insert([
            ['about_id' => $about->id, 'order' => 1, 'title' => 'What we offer', 'description' => 'Clinical massage therapy, recovery technologies, IV therapy and booster shots, KORU at Home, and continuing education for professionals.', 'created_at' => now(), 'updated_at' => now()],
            ['about_id' => $about->id, 'order' => 2, 'title' => 'Who we work with', 'description' => 'People living with pain or tension, active people focused on recovery, and practitioners looking to expand their clinical skills.', 'created_at' => now(), 'updated_at' => now()],
            ['about_id' => $about->id, 'order' => 3, 'title' => 'Why KORU', 'description' => 'Licensed Massage Therapist (Florida), Certified Cyriax Practitioner, and a physiotherapy background with published work in chronic pain and orthopedic rehabilitation.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Content migrations are intentionally not destructive on rollback.
    }
};
