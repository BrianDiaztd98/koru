<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'philosophy' => ['required', 'string'],
            'vision' => ['required', 'string'],
            'feature_1_title' => ['nullable', 'string', 'max:255'],
            'feature_1_description' => ['nullable', 'string'],
            'feature_2_title' => ['nullable', 'string', 'max:255'],
            'feature_2_description' => ['nullable', 'string'],
            'image_1' => ['nullable', 'image', 'max:2048'],
            'image_2' => ['nullable', 'image', 'max:2048'],
            'image_3' => ['nullable', 'image', 'max:2048'],
        ];
    }

    protected function prepareForValidation(): void
    {
        // Ensure text fields are properly handled
        $this->merge([
            'title' => $this->input('title', ''),
            'subtitle' => $this->input('subtitle', ''),
            'description' => $this->input('description', ''),
            'philosophy' => $this->input('philosophy', ''),
            'vision' => $this->input('vision', ''),
            'feature_1_title' => $this->input('feature_1_title', ''),
            'feature_1_description' => $this->input('feature_1_description', ''),
            'feature_2_title' => $this->input('feature_2_title', ''),
            'feature_2_description' => $this->input('feature_2_description', ''),
        ]);
    }
}
