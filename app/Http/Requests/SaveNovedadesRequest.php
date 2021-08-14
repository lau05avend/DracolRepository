<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveNovedadesRequest extends FormRequest
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

    public function rules()
    {
        return [
            'AsuntoNovedad' => 'required',
            'EstadoNovedad' => 'required',
            'DescripcionN' => 'required',
            'tipo_novedad_id' => 'required',
            'actividad_id' => 'required',
            'usuario_id' => '',
            'cliente_id' => ''
        ];
    }
    public function messages()
    {
        return[
        'AsuntoNovedad.required'=>'El asunto necesita completarse',
        'EstadoNovedad.required'=>'El esatado debe ser completado',
        'DescripcionN.required'=>'La describcion debe contenter texto',
        'Tipo_novedad_id.required'=>'Debe completar el tipo de novedad',
        'Actividad_id.required'=>'Debe completar la actividad',
        ];
    }
}
