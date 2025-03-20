<?php

namespace App\Http\Requests\Users;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'email' => ['required','email', Rule::unique('eo_users', 'phone_number')->ignore($this->userId)],
            'phone_number' => ['required', 'regex:/^[0-9\-\+\(\)\s]+$/', Rule::unique('eo_users', 'phone_number')->ignore($this->userId)],
            'password' => 'nullable|string|min:8|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|confirmed', 
            'role' => 'required|in:admin,organizer,attendee',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'name.regex' => 'Name should only contain alphabetic characters and spaces.',
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email format.',
            'email.unique' => 'The email has already been taken.',
            'phone_number.required' => 'Phone number is required.',
            'phone_number.regex' => 'Invalid phone number format.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, and one number.',
            'role.required' => 'Role is required.',
            'role.in' => 'Role must be one of: admin, organizer, attendee.',
            'password.confirmed' => 'The password confirmation does not match.', //password_confirmation
        ];
    }
}
