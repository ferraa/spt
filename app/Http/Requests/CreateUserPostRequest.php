<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserPostRequest extends Request
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
            'dni' => 'required|unique:users',
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'email',
            'categoria' => 'numeric',
            'password' => 'required|min:6'
        ];
    }
}
