<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageWhatsAppPreloadTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_renders_service_specific_whatsapp_preload_messages_in_english(): void
    {
        Service::factory()->create([
            'name_en' => 'DEEP TISSUE MASSAGE',
            'price' => 120,
            'duration' => '60 min',
            'category' => 'manual_therapy',
            'active_status' => true,
            'discount_eligible' => false,
        ]);

        Service::factory()->create([
            'name_en' => 'RECOVERY DRIP',
            'price' => 95,
            'duration' => '45 min',
            'category' => 'iv_therapy',
            'active_status' => true,
            'discount_eligible' => false,
        ]);

        Service::factory()->create([
            'name_en' => 'B12 ENERGY',
            'price' => 35,
            'duration' => '10 min',
            'category' => 'booster_shots',
            'active_status' => true,
            'discount_eligible' => false,
        ]);

        $response = $this->get('/');
        $response->assertOk();

        $content = $response->getContent();

        $generalMessage = 'Hello, I would like to schedule an appointment. Please share availability and booking details.';
        $serviceMessage = 'Hello, I would like more information about the DEEP TISSUE MASSAGE service. Price: USD 120.00. Duration: 60 min. Please share availability and the next steps to book.';
        $ivMessage = 'Hello, I would like more information about the RECOVERY DRIP IV therapy. Price: USD 95.00. Duration: 45 min. Please share availability and the next steps to book.';
        $boosterMessage = 'Hello, I would like more information about the B12 ENERGY booster shot. Price: USD 35.00. Please share availability and the next steps to book.';

        $this->assertStringContainsString(rawurlencode($generalMessage), $content);
        $this->assertStringContainsString(rawurlencode($serviceMessage), $content);
        $this->assertStringContainsString(rawurlencode($ivMessage), $content);
        $this->assertStringContainsString(rawurlencode($boosterMessage), $content);
    }
}
