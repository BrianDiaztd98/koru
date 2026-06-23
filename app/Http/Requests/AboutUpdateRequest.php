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
            'philosophy' => ['required', 'string'],
            'vision' => ['required', 'string'],
            'image_1' => ['nullable', 'image', 'max:2048'],
            'image_2' => ['nullable', 'image', 'max:2048'],
            'image_3' => ['nullable', 'image', 'max:2048'],
        ];
    }

    protected function prepareForValidation(): void
    {
        // Ensure text fields are properly handled
        $this->merge([
            'philosophy' => $this->input('philosophy', ''),
            'vision' => $this->input('vision', ''),
        ]);
    }
}
