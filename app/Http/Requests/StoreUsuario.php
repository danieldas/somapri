<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuario extends FormRequest
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
            'nombre' => 'required|min:2|max:50',
            'apellido_paterno' => 'required|min:2|max:50',
            'apellido_materno' => 'required|min:2|max:50',
            'ci' => 'regex:/^[0123456789]{5,9}[-]{0,1}[A-Z]{0,2}$/',
            'password' => 'required|min:6|max:30',
        ];
    }
}
