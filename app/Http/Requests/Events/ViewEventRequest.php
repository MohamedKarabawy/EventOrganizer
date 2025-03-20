<?php

namespace App\Http\Requests\Events;

use Illuminate\Foundation\Http\FormRequest;

class ViewEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'date' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'title.string' => 'Event title should be a string.',
            'title.max' => 'Event title should not exceed 255 characters.',
            'description.string' => 'Event description should be a string.',
            'location.string' => 'Event location should be a string.',
            'location.max' => 'Event location should not exceed 255 characters.',
            'date.date' => 'Event date must be a valid date.',
        ];
    }
}
