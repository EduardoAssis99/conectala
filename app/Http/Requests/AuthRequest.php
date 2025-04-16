<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Obtenha as regras de validação que se aplicam à solicitação.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    /**
     * Mensagens para as regras de validação.
     */
    public function messages()
    {
        return [
            'email.required' => 'Informe um E-mail para o usuário.',
            'email.email' => 'Informe um E-mail valido.',
            'password.required' => 'Informe uma senha para o usuário.',
        ];
    }
}
