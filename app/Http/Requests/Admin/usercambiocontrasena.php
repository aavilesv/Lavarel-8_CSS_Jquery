<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class usercambiocontrasena extends FormRequest
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
            'mypassword' => 'required',
           
            'password' => 'required|min:6|max:18',
           
        ];
    }
    public function messages()
    {
        return [
            'mypassword.required' => 'El campo es requerido',
       
        'password.required' => 'El campo es requerido',
        'password.min' => 'El mínimo permitido son 6 caracteres',
        'password.max' => 'El máximo permitido son 18 caracteres',
        ];
    }

      /*
    public function attributes()
    {
        return [
            'rrhempleado_id'=>'Empleado'
        ];
    }
  
    public function messages()
    {
        return ['gps.required'=>'Debe ingresar el link de google maps'];
    }*/
}
