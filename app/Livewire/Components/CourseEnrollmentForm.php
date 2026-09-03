<?php

namespace App\Livewire\Components;

use App\Mail\CourseEnrollmentSubmitted;
use App\Models\Course;
use App\Models\CourseEnrollment;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class CourseEnrollmentForm extends Component
{
    public array $courses = [];

    public ?int $course_id = null;

    public string $first_name = '';

    public string $last_name = '';

    public string $email = '';

    public string $phone = '';

    public string $license_number = '';

    public string $message = '';

    public string $turnstile_token = '';

    public bool $submitted = false;

    public function mount(?array $courses = null, ?Course $course = null): void
    {
        $courses ??= [];

        if ($course !== null) {
            abort_unless($course->active_status && $course->date?->isFuture(), 404);

            $courses = [[
                'id' => $course->id,
                'title' => $course->title_en,
                'date' => $course->date->format('M j, Y'),
            ]];
        }

        $this->courses = $courses;
        $this->course_id = isset($courses[0]['id']) ? (int) $courses[0]['id'] : null;
    }

    protected function rules(): array
    {
        return [
            'course_id' => [
                'required',
                'integer',
                Rule::exists('courses', 'id')->where(fn ($query) => $query
                    ->where('active_status', true)
                    ->whereDate('date', '>=', now()->toDateString())),
            ],
            'first_name' => ['required', 'string', 'max:60'],
            'last_name' => ['required', 'string', 'max:60'],
            'email' => ['required', 'email', 'max:160'],
            'phone' => ['required', 'regex:/^[2-9][0-9]{2}[2-9][0-9]{6}$/'],
            'license_number' => ['required', 'regex:/^MA[0-9]{5}$/'],
            'message' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function submit(): void
    {
        $this->license_number = strtoupper((string) preg_replace('/\s+/', '', trim($this->license_number)));
        $validated = $this->validate();

        if (! $this->turnstileIsValid()) {
            $this->addError('turnstile_token', 'Please complete the security check and try again.');

            return;
        }

        $validated['full_name'] = trim($validated['first_name'].' '.$validated['last_name']);
        unset($validated['first_name'], $validated['last_name']);
        $course = Course::query()->findOrFail($validated['course_id']);

        $enrollment = CourseEnrollment::query()->create([
            ...$validated,
            'source' => 'website',
        ]);

        Mail::to(config('mail.course_enrollment_recipient'))
            ->send(new CourseEnrollmentSubmitted($enrollment->load('course')));

        $this->reset(['first_name', 'last_name', 'email', 'phone', 'license_number', 'message', 'turnstile_token']);
        $this->course_id = $course->id;
        $this->submitted = true;
    }

    protected function turnstileIsValid(): bool
    {
        $secret = config('services.cloudflare.turnstile.secret');

        if (blank($secret)) {
            return true;
        }

        if (blank($this->turnstile_token)) {
            return false;
        }

        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => $secret,
            'response' => $this->turnstile_token,
            'remoteip' => request()->ip(),
        ]);

        return $response->successful() && $response->json('success') === true;
    }

    public function render(): View
    {
        return view('livewire.components.course-enrollment-form');
    }
}
