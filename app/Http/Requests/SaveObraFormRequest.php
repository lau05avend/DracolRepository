<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'NombreObra'=> ['required', Rule::unique('obras','NombreObra')->ignore($this->obra), 'min:5'],
            'DireccionObra'=> 'required |min: 10',
            'CiudadObra'=> 'required|min:3',
            'TipoMaterialSuelo' => 'required',
            'tipo_obra_id' => 'required',
            'cliente_id' => 'required',
            'MedidaArea' => 'min:1',
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
            'NombreObra.required' => 'La obra necesita un nombre/titulo.'
        ];
    }

    public function attributes()
    {
        return [
            'NombreObra' => 'Nombre obra',
            'cliente_id' => 'Cliente',
            'DireccionObra'=> 'Direccion Obra',
            'CiudadObra'=> 'Ciudad Obra',
            'TipoMaterialSuelo' => 'Tipo de obra',
            'tipo_obra_id' => 'Tipo de Material Suelo',
        ];
    }
}
