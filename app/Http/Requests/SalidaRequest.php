<?php

namespace SIS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalidaRequest extends FormRequest
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
            'destino_id' => 'required',
            'funcionario_id' => 'required',
            // 'mecanico_id' => 'required',
            // 'conductor_id' => 'required',
            'cantidad' => 'required',
            'total' => 'required',
        ];
    }
}
