<?php

namespace Tests\Feature;

use App\Livewire\Components\CourseEnrollmentForm;
use App\Mail\CourseEnrollmentSubmitted;
use App\Models\Course;
use App\Models\CourseEnrollment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class CourseEnrollmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_visitor_can_enroll_in_an_active_course_from_the_website(): void
    {
        Mail::fake();

        $course = Course::query()->create([
            'title_en' => 'Advanced Recovery Workshop',
            'description_en' => 'Clinical recovery training.',
            'ce_credits' => 8,
            'price' => 250,
            'date' => now()->addMonth()->toDateString(),
            'active_status' => true,
        ]);

        Livewire::test(CourseEnrollmentForm::class, [
            'courses' => [[
                'id' => $course->id,
                'title' => $course->title_en,
            ]],
        ])
            ->set('course_id', $course->id)
            ->set('full_name', 'Alex Morgan')
            ->set('email', 'alex@example.com')
            ->set('phone', '7865550100')
            ->set('license_number', 'MA 12345')
            ->set('message', 'Please share the schedule.')
            ->call('submit')
            ->assertSet('submitted', true)
            ->assertSee('Thank you');

        $this->assertDatabaseHas('course_enrollments', [
            'course_id' => $course->id,
            'full_name' => 'Alex Morgan',
            'email' => 'alex@example.com',
            'license_number' => 'MA12345',
            'source' => 'website',
        ]);

        Mail::assertSent(CourseEnrollmentSubmitted::class);
    }

    public function test_visitor_must_complete_required_enrollment_fields(): void
    {
        $course = Course::query()->create([
            'title_en' => 'Advanced Recovery Workshop',
            'description_en' => 'Clinical recovery training.',
            'ce_credits' => 8,
            'price' => 250,
            'date' => now()->addMonth()->toDateString(),
            'active_status' => true,
        ]);

        Livewire::test(CourseEnrollmentForm::class, [
            'courses' => [['id' => $course->id, 'title' => $course->title_en]],
        ])
            ->set('course_id', $course->id)
            ->call('submit')
            ->assertHasErrors(['full_name', 'email', 'phone', 'license_number']);

        $this->assertSame(0, CourseEnrollment::query()->count());
    }

    public function test_visitor_cannot_enroll_in_an_inactive_or_expired_course(): void
    {
        $course = Course::query()->create([
            'title_en' => 'Unavailable Workshop',
            'description_en' => 'This course is not public.',
            'ce_credits' => 8,
            'price' => 250,
            'date' => now()->subDay()->toDateString(),
            'active_status' => false,
        ]);

        Livewire::test(CourseEnrollmentForm::class, [
            'courses' => [['id' => $course->id, 'title' => $course->title_en]],
        ])
            ->set('course_id', $course->id)
            ->set('full_name', 'Alex Morgan')
            ->set('email', 'alex@example.com')
            ->set('phone', '7865550100')
            ->set('license_number', 'MA12345')
            ->call('submit')
            ->assertHasErrors(['course_id']);

        $this->assertSame(0, CourseEnrollment::query()->count());
    }

    public function test_phone_must_be_exactly_ten_digits(): void
    {
        $course = Course::query()->create([
            'title_en' => 'Advanced Recovery Workshop',
            'description_en' => 'Clinical recovery training.',
            'ce_credits' => 8,
            'price' => 250,
            'date' => now()->addMonth()->toDateString(),
            'active_status' => true,
        ]);

        Livewire::test(CourseEnrollmentForm::class, [
            'courses' => [['id' => $course->id, 'title' => $course->title_en]],
        ])
            ->set('course_id', $course->id)
            ->set('full_name', 'Alex Morgan')
            ->set('email', 'alex@example.com')
            ->set('phone', '+1 786-555-0100')
            ->set('license_number', 'MA12345')
            ->call('submit')
            ->assertHasErrors(['phone']);

        $this->assertSame(0, CourseEnrollment::query()->count());
    }

    public function test_license_number_must_use_ma_and_five_digits(): void
    {
        $course = Course::query()->create([
            'title_en' => 'Advanced Recovery Workshop',
            'description_en' => 'Clinical recovery training.',
            'ce_credits' => 8,
            'price' => 250,
            'date' => now()->addMonth()->toDateString(),
            'active_status' => true,
        ]);

        Livewire::test(CourseEnrollmentForm::class, [
            'courses' => [['id' => $course->id, 'title' => $course->title_en]],
        ])
            ->set('course_id', $course->id)
            ->set('full_name', 'Alex Morgan')
            ->set('email', 'alex@example.com')
            ->set('phone', '7865550100')
            ->set('license_number', 'RN12345')
            ->call('submit')
            ->assertHasErrors(['license_number']);

        $this->assertSame(0, CourseEnrollment::query()->count());
    }
}
