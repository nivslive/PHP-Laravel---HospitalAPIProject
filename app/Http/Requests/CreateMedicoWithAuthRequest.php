<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMedicoWithAuthRequest extends FormRequest
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
            'cidade_id' => 'required',
            'especialidade' => 'required|string|max:100',
            'nome' => 'required|string|max:100',
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

            'cidade_id.required' => 'O campo cidade_id é obrigatório.',

            'especialidade.required' => 'O campo especialidade é obrigatório.',
            'especialidade.string' => 'O campo especialidade deve ser uma string.',
            'especialidade.max' => 'O campo especialidade deve ter no máximo :max caracteres.',

            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser uma string.',
            'nome.max' => 'O campo nome deve ter no máximo :max caracteres.',
            
        ];
    }
}
