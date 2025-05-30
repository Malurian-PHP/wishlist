<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'string',
                'email'
            ],
            'password' => [
                'required',
                'string'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'The email field is required.',
            'password.required' => 'The password field is required.',
        ];
    }
}
