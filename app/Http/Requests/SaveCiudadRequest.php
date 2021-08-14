<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveCiudadRequest extends FormRequest
{
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
            'LugarNacimientoU' => ['required',Rule::unique('lugar_nacimientos','LugarNacimientoU')->ignore($this->LugarNacimiento)]
        ];
    }
    public function attributes(){
        return [
            'LugarNacimiento' => 'Nombre de Ciudad'
        ];
    }
}
