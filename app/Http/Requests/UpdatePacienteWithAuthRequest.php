<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePacienteWithAuthRequest extends FormRequest
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
            'nome' => 'string|max:100|nullable',
            'cpf' => 'string|max:20|nullable',
            'celular' => 'string|max:20|nullable',
        ];
    }

    /**
     * Get the validation messages that apply to the rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nome.string' => 'O campo nome deve ser uma string.',
            'nome.max' => 'O campo nome deve ter no máximo :max caracteres.',

            'cpf.string' => 'O campo cpf deve ser uma string.',
            'cpf.max' => 'O campo cpf deve ter no máximo :max caracteres.',

            'celular.string' => 'O campo celular deve ser uma string.',
            'celular.max' => 'O campo celular deve ter no máximo :max caracteres.',
        ];
    }
}
