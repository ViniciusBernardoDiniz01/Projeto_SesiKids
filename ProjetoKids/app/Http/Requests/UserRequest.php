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
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo nome Obrigatório!',
            'email.required' => 'Campo email Obrigatório',
            'email.email' => 'Insira um email válido',
            'password.required' => 'Campo senha Obrigatório',
            'password.min' => 'A senha deve conter no mínimo :min caracteres',
        ];
    }
}