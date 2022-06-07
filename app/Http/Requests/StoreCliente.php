<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCliente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // esto te autoriza si tiene los permisos o no
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
          // esto retorna al formulario 
         'nombre'=>'required|max:80','apellido'=>'required|max:80',
            'cedula'=>'required',
            'fechanacimiento'=>'required'
        ];
    }
    public function attributes()
    {
        return [
            'nombre'=>'Nombre','apellido'=>'Apellido',
            'fechanacimiento'=>'Fecha de nacimiento'
        ];
    }
    /*
    public function messages()
    {
        return ['gps.required'=>'Debe ingresar el link de google maps'];
    }*/
}
