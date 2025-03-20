<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:eo_users,email',
            'phone_number' => 'required|regex:/^[0-9\-\+\(\)\s]+$/|unique:eo_users,phone_number,' . $this->user()->id,
            'password' => 'required|string|min:8|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|confirmed',
            'role' => 'nullable|in:attendee,organizer,admin,',
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
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, and one number.',
            'role.required' => 'Role is required.',
            'role.in' => 'Role must be one of: admin, organizer, attendee.',
            'password.confirmed' => 'The password confirmation does not match.', //password_confirmation
        ];
    }
}
