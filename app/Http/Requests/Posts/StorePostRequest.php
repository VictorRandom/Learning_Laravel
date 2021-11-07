<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (! Auth::id())
            return false;

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
            'title' => 'required|min:4',
            'description' => 'required|min:4',
        ];
    }

    public function messages() 
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'title.min' => 'O título tem que ter pelo menos 4 caracteres.',
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição tem que ter pelo menos 4 caracteres.'
        ];
    }
}
