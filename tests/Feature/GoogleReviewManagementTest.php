<?php

namespace Tests\Feature;

use App\Livewire\Components\TestimonialsShowcase;
use App\Models\GoogleReview;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class GoogleReviewManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_google_review_manager_and_create_review(): void
    {
        $this->actingAs(User::factory()->admin()->create(), 'web');

        $response = $this->get(route('admin.google-reviews.index'));
        $response->assertOk();

        $review = GoogleReview::create([
            'author_name' => 'Ana Pérez',
            'author_role' => 'Recovery client',
            'rating' => 5,
            'content' => 'Excellent support and care.',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $this->assertDatabaseHas('google_reviews', [
            'id' => $review->id,
            'author_name' => 'Ana Pérez',
        ]);

        Livewire::test('admin.google-review-manager')
            ->assertSee('Ana Pérez');
    }

    public function test_only_active_google_reviews_are_shown_publicly(): void
    {
        GoogleReview::query()->create([
            'author_name' => 'Visible reviewer',
            'content' => 'Visible review content.',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        GoogleReview::query()->create([
            'author_name' => 'Hidden reviewer',
            'content' => 'Hidden review content.',
            'is_active' => false,
            'sort_order' => 2,
        ]);

        Livewire::test(TestimonialsShowcase::class)
            ->assertSee('Visible reviewer')
            ->assertSee('Visible review content.')
            ->assertDontSee('Hidden reviewer')
            ->assertDontSee('Hidden review content.');
    }

    public function test_testimonials_showcase_paginates_in_groups_of_three(): void
    {
        $testimonials = collect(range(1, 5))->map(fn (int $index) => [
            'id' => $index,
            'category' => 'google',
            'title' => 'Reviewer '.$index,
            'description' => 'Review content '.$index,
        ])->all();

        Livewire::test(TestimonialsShowcase::class, ['testimonials' => $testimonials])
            ->assertSee('Reviewer 1')
            ->assertSee('Reviewer 2')
            ->assertSee('Reviewer 3')
            ->assertDontSee('Reviewer 4')
            ->assertSee('Next');
    }
}
