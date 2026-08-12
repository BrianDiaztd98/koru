<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageHeaderNavigationTest extends TestCase
{
    use RefreshDatabase;

    public function test_header_navigation_targets_use_unique_section_ids(): void
    {
        $response = $this->get('/');

        $response->assertOk();

        $content = $response->getContent();

        $this->assertSame(1, substr_count($content, 'id="about-us"'));
        $this->assertSame(1, substr_count($content, 'id="services"'));
        $this->assertSame(1, substr_count($content, 'id="education"'));
        $this->assertSame(1, substr_count($content, 'id="team"'));
        $this->assertSame(1, substr_count($content, 'id="location"'));
    }
}
