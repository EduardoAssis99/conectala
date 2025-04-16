<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $id = $this->route('user.id');

        return [
            'name' => 'string|sometimes',
            'email' => [
                'sometimes',
                'email',
                'unique:users,email,' . $id,
            ],
            'password' => 'string|sometimes',
            'cpf' => [
                'sometimes',
                'unique:users,cpf,' . $id,
                'regex:(^\d{3}\.?\d{3}\.?\d{3}\-?\d{2}$)' //valida apenas formato!
            ],
            'phone' => 'sometimes|string|nullable',
        ];
    }

    /**
     * Mensagens para as regras de validação.
     */
    public function messages()
    {
        return [
            'name.required' => 'Informe o nome do usuário.',
            'email.required' => 'Informe um E-mail para o usuário.',
            'email.email' => 'Informe um E-mail valido.',
            'email.unique' => 'O E-mail informado já está sendo utilizado.',
            'password.required' => 'Informe uma senha para o usuário.',
            'cpf.required' => 'Informe o CPF usuário.',
            'cpf.regex' => 'Informe o CPF corretamente.',
            'cpf.unique' => 'O CPF informado já está sendo utilizado.',
        ];
    }
}
