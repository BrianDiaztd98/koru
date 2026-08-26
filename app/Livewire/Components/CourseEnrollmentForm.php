<?php

namespace App\Livewire\Components;

use App\Mail\CourseEnrollmentSubmitted;
use App\Models\Course;
use App\Models\CourseEnrollment;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CourseEnrollmentForm extends Component
{
    public array $courses = [];

    public ?int $course_id = null;

    public string $full_name = '';

    public string $email = '';

    public string $phone = '';

    public string $license_number = '';

    public string $message = '';

    public bool $submitted = false;

    public function mount(array $courses = []): void
    {
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
            'full_name' => ['required', 'string', 'max:120'],
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
        $course = Course::query()->findOrFail($validated['course_id']);

        $enrollment = CourseEnrollment::query()->create([
            ...$validated,
            'source' => 'website',
        ]);

        Mail::to(config('mail.course_enrollment_recipient'))
            ->send(new CourseEnrollmentSubmitted($enrollment->load('course')));

        $this->reset(['full_name', 'email', 'phone', 'license_number', 'message']);
        $this->course_id = $course->id;
        $this->submitted = true;
    }

    public function render(): View
    {
        return view('livewire.components.course-enrollment-form');
    }
}
