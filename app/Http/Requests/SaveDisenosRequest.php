<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveDisenosRequest extends FormRequest
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
            'ImagenPlano' => 'required',
            'ObservacionDiseno' => 'required',
            'obra_id' => 'required'
        ];
    }

    public function attributes(){
        return [
            'ImagenPlano' => 'Imagen del plano',
            'ObservacionDiseno' => 'Observación',
            'obra_id' => 'Obra'
        ];
    }
}

