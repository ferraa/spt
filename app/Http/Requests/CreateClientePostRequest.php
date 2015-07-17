<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateClientePostRequest extends Request
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
            'telefono' => 'unique:clientes|required|numeric',
            'dni' => 'unique:clientes',
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'email|unique:clientes'

        ];
    }
}
