<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveActividadRequest extends FormRequest
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
            'NombreActividad' => 'required',
            'DescripcionActividad' => 'required',
            'FechaInicioA' => 'required',
            'FechaFinA' => 'required|after:FechaInicioA',
            'estado_actividad_id' => 'required',
            'fase_tarea_id' => 'required',
            'obra_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'NombreActividad.required' => 'La actividad necesita un nombre/titulo.',
            'estado_actividad_id.required' => 'El campo "Estado de actividad" es obligatorio.',
            'fase_tarea_id.required' => 'El campo "Fase de actividad" es obligatorio.',
            'obra_id.required' => 'El campo "Obra" es obligatorio.'
        ];
    }
}
