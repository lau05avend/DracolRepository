<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveClienteRequest extends FormRequest
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
            'NombreCC' => ['required',Rule::unique('clientes','NombreCC')->ignore($this->cliente)],
            'NumIdentificacion' => ['required',Rule::unique('clientes','NumIdentificacion')->ignore($this->cliente)],
            'NumCelular' => 'required',
            'NumTelefono' => 'required',
            'CorreoCliente' => ['required',Rule::unique('clientes','CorreoCliente')->ignore($this->cliente),'email'],
            'tipo_identificacion_id' => 'required',
            'tipo_cliente_id' => 'required',
            'ContrasenaC' => 'required',
            'FotoL' => ''
        ];
    }
    public function attributes(){
        return [
            'NombreCC' => 'Nombre Completo',
            'NumIdentificacion' => 'Num.Documento',
            'NumCelular' => 'Num.Celular',
            'NumTelefono' => 'Num.Telefono',
            'CorreoCliente' => 'Correo electronico',
            'tipo_identificacion_id' => 'Tipo Identificación',
            'tipo_cliente_id' => 'Tipo Cliente',
            'ContrasenaC' => 'Contraseña'
        ];
    }
}
