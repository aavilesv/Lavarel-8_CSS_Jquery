<?php

namespace App\Http\Requests\recursoshumanos;

use Illuminate\Foundation\Http\FormRequest;

class empleado extends FormRequest
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
            // esto retorna al formulario 
           'nombre'=>'required|max:80','apellido'=>'required|max:80',
           'fechanacimiento'=>'required','direccion'=>'required',
              'cdaorecinto'=>'required',
              'contacto'=>'required|max:10|min:10',
              'canton_id'=>'required','email'=>'required',
              'fechaingreso'=>'required',
              
              'sueldo'=>'required',
              'rrharea_id'=>'required',
              'rrhcargo_id'=>'required',
              'rrhprofesion_id'=>'required',
               'sexo'=>'required'
          ];
    }
    public function attributes()
    {
        return [
            'nombre'=>'Nombre','apellido'=>'Apellido',
            'cdaorecinto'=>'Cdla. o Recinto',
            'contacto'=>'Contacto 1',
            'canton_id'=>'Cantón', 'rrhcargo_id'=>'Cargo', 
            'rrhprofesion_id'=>'Profesión',
            'rrharea_id'=>'Área','fechaingreso'=>'Fecha de Ingreso',
            'fechanacimiento'=>'Fecha de nacimiento'
            ,'direccion'=>'Dirección',
        ];
    }
}
