<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userID = $this->route('user') ? $this->route('user')->id : null;
        
    return [
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $userID, // Corrigido para 'users'
        'password' => 'required|min:8',
    ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo nome Obrigatório!',
            'email.required' => 'Campo email Obrigatório',
            'email.email' => 'Insira um email válido! example: example@site.com',
            'email.unique' => 'Este email já está cadastrado',
            'password.required' => 'Campo senha Obrigatório',
            'password.min' => 'A senha deve conter no mínimo :min caracteres',
        ];
    }
}