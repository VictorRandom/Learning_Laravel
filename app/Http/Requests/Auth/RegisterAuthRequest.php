<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:4',
            'email' => 'required',
            'password' => 'required|min:4',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.min' => 'O nome deve ter no minimo 4 caracteres',
            'email.required' => 'O email é obrigatório',
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha deve ter no minimo 4 caracteres',
        ];
    }
}
