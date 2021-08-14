<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveTipoMaterialRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'NombreTipoM' => ['required',Rule::unique('tipo_materials','NombreTipoM')->ignore($this->TipoMaterial)],
            'DescripcionMaterial' => 'required'
        ];
    }
    public function messages(){
        return [
            'NombreTipoM' => 'Nombre del material',
            'DescripcionMaterial' => 'Descripción'

        ];
    }
}
