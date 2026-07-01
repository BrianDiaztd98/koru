<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Testimonial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ClientOutcomesAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_client_outcomes_admin_page_is_available(): void
    {
        $this->actingAs(User::factory()->admin()->create(), 'web');

        $response = $this->get(route('admin.client-outcomes.index'));

        $response->assertStatus(200);
        $response->assertSee('Client Outcomes');
        $response->assertSee('Create a new outcome story');
    }

    public function test_testimonials_showcase_paginates_in_groups_of_three(): void
    {
        $testimonials = collect(range(1, 5))->map(fn (int $index) => [
            'id' => $index,
            'category' => 'clinical',
            'title' => 'Story '.$index,
            'description' => 'Description '.$index,
            'video_path' => 'videos/testimonials/'.$index.'.mp4',
        ])->all();

        Livewire::test(\App\Livewire\Components\TestimonialsShowcase::class, ['testimonials' => $testimonials])
            ->assertSee('Story 1')
            ->assertSee('Story 2')
            ->assertSee('Story 3')
            ->assertDontSee('Story 4')
            ->assertSee('Next');
    }

    public function test_koru_content_seeder_creates_client_outcomes_without_legacy_required_fields(): void
    {
        $this->artisan('db:seed', ['--class' => \Database\Seeders\KoruContentSeeder::class])
            ->assertExitCode(0);

        $this->assertDatabaseHas('testimonials', [
            'title' => 'Tour the recovery lounge',
            'category' => 'lounge',
            'video_path' => 'videos/testimonials/1.mp4',
        ]);
    }

    public function test_admin_can_edit_a_client_outcome(): void
    {
        $this->actingAs(User::factory()->admin()->create(), 'web');

        $testimonial = Testimonial::query()->create([
            'title' => 'Original outcome',
            'description' => 'Original description',
            'category' => 'clinical',
            'video_path' => 'videos/testimonials/original.mp4',
            'author_name' => 'Original Author',
            'author_role' => 'Original Role',
            'quote_en' => 'Original quote EN',
            'quote_es' => 'Original quote ES',
            'active_status' => true,
        ]);

        Livewire::test(\App\Livewire\Admin\ClientOutcomesPage::class)
            ->call('openEditForm', $testimonial->id)
            ->assertSet('testimonial.id', $testimonial->id)
            ->set('title', 'Updated outcome')
            ->set('description', 'Updated description')
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('testimonials', [
            'id' => $testimonial->id,
            'title' => 'Updated outcome',
            'description' => 'Updated description',
        ]);
    }
}
