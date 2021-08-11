<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveObraFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;    //validar si el usuario que va a realizar la accion, esta autorizado para hacerlo
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'NombreObra'=> ['required'],
            'DireccionObra'=> 'required |min: 10',
            'CiudadObra'=> 'required|min:3',
            'TipoMaterialSuelo' => 'required',
            'tipo_obra_id' => 'required',
            'cliente_id' => 'required',
            'MedidaArea' => '',
            'MedidaPerimetro' => '',
            'CondicionDesnivel' => '',
            'DetalleCondicionPiso' => '',
            'DatosAdicionales' => '',
            'DatosAdicionales' => ''
        ];
    }

    public function messages()
    {
        return [
            'NombreObra.required' => 'La obra necesita un nombre/titulo.',
            'tipo_obra_id.required' => 'El campo "Tipo obra" es obligatorio.'
        ];
    }
}
