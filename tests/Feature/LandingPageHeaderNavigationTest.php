<?php

namespace Tests\Feature;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
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

    public function test_education_seeder_does_not_create_course_records(): void
    {
        Artisan::call('db:seed', ['--class' => 'Database\\Seeders\\KoruContentSeeder']);

        $this->assertSame(0, Course::query()->count());
    }
}
