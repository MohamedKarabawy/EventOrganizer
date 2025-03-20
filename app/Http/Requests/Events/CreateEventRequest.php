<?php

namespace App\Http\Requests\Events;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'date' => 'required|date|after:today',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Event title is required.',
            'title.string' => 'Event title should be a string.',
            'title.max' => 'Event title should not exceed 255 characters.',
            'description.required' => 'Event description is required.',
            'description.string' => 'Event description should be a string.',
            'location.required' => 'Event location is required.',
            'location.string' => 'Event location should be a string.',
            'location.max' => 'Event location should not exceed 255 characters.',
            'date.required' => 'Event date is required.',
            'date.date' => 'Event date must be a valid date.',
            'date.after' => 'Event date must be a future date.',
        ];
    }
}
