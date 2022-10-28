<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProducto extends FormRequest
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
            'codigo' => 'required|min:2|max:20',
            'descripcion' => 'required|min:2|max:100',
            'fabrica' => 'required|min:2|max:70',
            'precio_unitario' => 'numeric|min:1|max:9999999',
            'utilidad' => 'numeric|min:1|max:999',
        ];
    }
}
