<?php

namespace App\Http\Requests\nominapagos;

use Illuminate\Foundation\Http\FormRequest;

class nominarequest extends FormRequest
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
         'sueldo'=>'required|max:80','rrhempleado_id'=>'required',
            'aporteiess'=>'required',
            'dialaborales'=>'required',
            'liquido'=>'required',
            'totaldescuentos'=>'required'
            
        ];
    }
    public function attributes()
    {
        return [
            'rrhempleado_id'=>'Empleado'
        ];
    }
    /*
    public function messages()
    {
        return ['gps.required'=>'Debe ingresar el link de google maps'];
    }*/
}
