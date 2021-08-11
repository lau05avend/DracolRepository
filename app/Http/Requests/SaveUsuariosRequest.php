<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUsuariosRequest extends FormRequest
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
            'NombreUsuario' => 'required',
            'ApellidosUsuario' => 'required',
            'NumeroDocumento' => 'required |',
            'NumeCelular' => 'required',
            'NumTelefono' => 'required',
            'FechaNacimientoU' => 'required',
            'CorreoUsuario' => 'required | email',
            'GeneroUsuario' => 'required',
           'DireccionUsuario' => 'required',
            'EdadU' => 'required | integer',
            'contrasena' => 'required|min:5',
            'Disponibilidad' => 'required',
            'FotoUsuario' => 'required',
            'rol_id' => 'required',
            'tipo_identificacion_id' => 'required',
            'estado_civil_id' => 'required',
            'lugar_nacimiento_id' => 'required',
            'confcontrasena' => 'required|min:5'
        ];
    }
}
