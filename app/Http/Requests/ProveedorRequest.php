<?php

namespace SIS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorRequest extends FormRequest
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
            'nombre' => 'required',
            'nit' => 'required|integer',
            'direccion' => 'required',
            'telefono' => 'required',
            'persona_contacto' => 'required',
            'ciudad' => 'required'
        ];
    }
}
