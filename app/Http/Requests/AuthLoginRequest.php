<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'email|string|required',
            'password' => 'string|required',
        ];
    }
    public function messages(): array
    {
        return [
            'email.string' => 'O campo email deve ser uma string.',
            'email.email' => 'O campo email não tem um email válido.',
            'email.required' => 'O campo email é requerido.',

            'password.string' => 'O campo email deve ser uma string.',
            'password.required' => 'O campo email é requerido.',
        ];
    }
}
